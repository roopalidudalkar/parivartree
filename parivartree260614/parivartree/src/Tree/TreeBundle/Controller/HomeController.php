<?php

namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Tree\TreeBundle\Entity\User;
use Tree\TreeBundle\Entity\Account;
use Tree\TreeBundle\Entity\Tree;
use Tree\TreeBundle\Entity\Chatusers;

class HomeController extends Controller
{
	public function indexAction(Request $request)
	{
		$session = $this->container->get('session');
	  	$auth = $this->authenticate();

		if($auth){
			return $this->redirect($this->generateUrl('tree_tree_mytree'));			
		}
		else{
			$user = new User();

			$form = $this->createFormBuilder($user)
				->add('email', 'text', array('attr'=>array('class'=>'form-control','placeholder'=>'Email/Mobile')))
				->add('firstname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control', 'placeholder'=>'Firstname')))
				->add('lastname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control', 'placeholder'=>'Lastname')))
				->add('gender','choice', array('choices'=>array(1=>'Male', 2=>'Female'), 'mapped'=>FALSE, 'expanded'=>TRUE, 'multiple'=>FALSE))
				->add('submit', 'submit', array('label'=>'Sign Up', 'attr'=>array('class'=>'btn btn-primary btn-lg sign-up')))
				->getForm(); 
			
		
			$loginform = $this->createFormBuilder($user)
				->setAction($this->generateUrl('tree_tree_login'))
				->add('email','text', array('trim'=>TRUE, 'attr'=>array('class'=>'form-control')))
				
				->add('password', 'password', array('attr'=>array('class'=>'form-control')))
				->add('rememerme', 'choice', array('mapped'=>FALSE, 'required'=>FALSE, 'multiple'=>TRUE, 'expanded'=>TRUE, 'choices'=>array('1'=>'Remeber Me')))
				->add('submit', 'submit', array('label'=>'Log In','attr'=>array('class'=>'btn btn-primary btn-sm')))
				->getForm();
			
			$form->handleRequest($request);

			if($request->isMethod('POST')){
				if($form->isValid()){			
					$email = $form['email']->getData();
					$firstname = $form['firstname']->getData();
					$lastname = $form['lastname']->getData();
					$gender = $form['gender']->getData();	
					
					$validation = "Email";			
						
					if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  					{
						if(!is_numeric($email)){
                                                	$session = $this->container->get('session');
                                                	$session->getFlashBag()->add('error', 'Please enter a valid mobile or email');
                                                	return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));
                                        	}
	                                         if(strlen($email)!=10){
        	                                         $session = $this->container->get('session');
                	                                 $session->getFlashBag()->add('error', 'Please enter valid email-id or mobile number');
                        	                         return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));
                                	        }
						
						$validation = "Mobile";
					}	

					if(!ctype_alpha($firstname)){
						$session = $this->container->get('session');
	                                        $session->getFlashBag()->add('error', 'Please enter valid First name');
        	                                return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));

					}
					if(!ctype_alpha($lastname)){
                                                $session = $this->container->get('session');
                                                $session->getFlashBag()->add('error', 'Please enter valid Last name');
                                                return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));

                                        }

				    	$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email));
				
				     	foreach($userArray as $u){
					     $uid = $u->getId();
					     $status = $u->getStatus();
				     	}
			
					if(isset($uid)){
						if($status == 0){
							$em = $this->getDoctrine()->getManager();

							$user =  $em->getRepository('TreeTreeBundle:User')->find($uid);
							
							$account = new Account();

							$mobilecode = $this->generateRandom(7);
							$today = new \Datetime();
							$newhash = $this->generateHash(16);

							$user->setMobilecode($mobilecode);
							$user->setCreated($today);
							$user->setUpdated($today);
							$user->setStatus(0);
							$user->setUserhash($newhash);
							$user->setAuthmechanism($validation);					
							$em->flush();
	
							$account = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$uid));

							foreach($account as $a){
								$accountid = $a->getId();	
							}

							$account = $em->getRepository('TreeTreeBundle:Account')->find($accountid);
									
							$account->setFirstname($firstname);                                      
							$account->setLastname($lastname);
							$account->setGender($gender);
							$em->flush();
				
							$chatuser = new Chatusers();

							$chatuser->setUid($uid);
							$chatuser->setUsername($firstname." ".$lastname);
							$chatuser->setPassword("dummy password");
							$chatuser->setEmail("dummy email");

							$em->persist($chatuser);
							$em->flush();
							
							if($validation == 'Mobile'){
								return $this->redirect($this->generateUrl('tree_tree_sms_verify', array('mobilecode'=>$mobilecode, 'userhash'=>$newhash)));
							}
							else {
								$message = \Swift_Message::newInstance()
                                        			        ->setSubject('Parivartree : Welcoming Email')
                                                			->setFrom('anup@netiapps.com')
		                            		                ->setTo($email)
		                                                	->setContentType("text/html")
        		                                       		->setBody($this->renderView('TreeTreeBundle:Emailtemplates:welcome_email.html.twig', array('userid'=>$uid,'username'=>$firstname." ".$lastname, 'userhash'=>$newhash)));

								$this->get('mailer')->send($message);
						
								$session = $this->container->get('session');
								$session->getFlashBag()->add('success', 'Registration successfull! An activation link has been sent to your email.');
								return $this->render('::base_success.html.twig');
							}
						}
						else {
							$session->getFlashBag()->add('message','This email is registered with us. Please login to access the features, or click on forgot password if you have forgotten your password.');
							return $this->redirect($this->generateUrl('tree_tree_homepage'));
						}
					}
					else {
						$em = $this->getDoctrine()->getManager();

						$user =  new User();
						$account = new Account();
				
						$mobilecode = $this->generateRandom(7);
						$today = new \Datetime();
						$newhash = $this->generateHash(16);					
						
						$user->setEmail($email);
						$user->setMobilecode($mobilecode);	
						$user->setCreated($today);
						$user->setUpdated($today);	
						$user->setStatus(0);
						$user->setUserhash($newhash);
						$user->setAuthmechanism($validation);

						$em->persist($user);
						$em->flush();

						$userid = $user->getId();

						$tree = new Tree();

        	                                $tree->setNodeid($userid);
                	                        $tree->setRelnodeid($userid);
                        	                $tree->setPosition(2);
                                	        $tree->setRelationid(0);
						$em->persist($tree);
	                                        $em->flush();

						$account = new Account();
					
						$account->setUserid($userid);
						$account->setUserprofileid(8);
						$account->setFirstname($firstname);
                                        	$account->setLastname($lastname);
						$account->setGender($gender);
					
						$em->persist($account);
						$em->flush();		

						$chatuser = new Chatusers();

                                        	$chatuser->setUid($userid);
                                        	$chatuser->setUsername($firstname." ".$lastname);
                                        	$chatuser->setPassword("dummy password");
                                       		$chatuser->setEmail("dummy email");

                                       	 	$em->persist($chatuser);
                                                $em->flush();
															
						if($validation == 'Mobile'){
	                                                return $this->redirect($this->generateUrl('tree_tree_sms_verify', array('mobilecode'=>$mobilecode, 'userhash'=>$newhash)));
                                                }
						else {
							$message = \Swift_Message::newInstance()
								->setSubject('Parivartree : Welcoming Email')		
								->setFrom('anup@netiapps.com')	
								->setTo($email)
								->setContentType("text/html")
								->setBody($this->renderView('TreeTreeBundle:Emailtemplates:welcome_email.html.twig', array('userid'=>$userid, 'username'=>$firstname." ".$lastname, 'userhash'=>$newhash)));

							$this->get('mailer')->send($message);
					
							return $this->render('::base_success.html.twig');
						}
					}
				}
				else {
					return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));
				}
			}
			return $this->render('TreeTreeBundle:Home:index.html.twig', array('form'=>$form->createView(), 'loginform'=>$loginform->createView()));
		}
		
	}

	public function authenticate()
	{
		$session = $this->container->get('session');

                if($session->has('uid')){
                        $uid = $session->get('uid');
                        $sessionid = $session->get('sessionid');
                        $sessionhash = $session->get('sessionhash');

                        $user = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('id'=>$uid, 'sessionid'=>$sessionid, 'sessionhash'=>$sessionhash));

                        foreach($user as $u){
                                $userid = $u->getId();
                        }

                        if(isset($userid) && ($userid == $uid)){
                              return 1;
                        }

                        return 0;
                } else {
                        return 0;
                }

	}
	
	public function generateRandom($length)
        {
                $characters = '0123456789';
                $randomString = '';

                for($i=0; $i< $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }

                return $randomString;
        }

        public function generateHash($length)
        {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for($i=0; $i< $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }

                $userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('userhash'=>$randomString));

                foreach ($userArray as $u) {
                        $uid = $u->getId();
                }

                if (isset($uid)) {
                        $this->generateHash(16);
		} else {
                        return $randomString;
                }
        }

}
?>
