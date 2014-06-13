<?php

namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Symfony\Component\Validator\Constraints as Assert;
use Tree\TreeBundle\Entity\User;
use Tree\TreeBundle\Entity\Account;
use Tree\TreeBundle\Entity\Usertoaccessrel;
use Tree\TreeBundle\Entity\Usertoiprel;
use Tree\TreeBundle\Entity\Relation;

class UserController extends Controller
{
	public function updateprofileAction(Request $request, $attempt)
	{
		$session = $this->container->get('session');	
		$em = $this->getDoctrine()->getManager();

		$uid = $session->get('uid');
	
		$account = new Account();
	
		$accountArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$uid));
		
		foreach($accountArray as $a){
			$accountid = $a->getId();
			$form = $this->createFormBuilder($account)
				->add('firstname', 'text', array('data'=>$a->getFirstname()))
				->add('lastname', 'text', array('data'=>$a->getLastname()))
				->add('dob','date', array('input'=>'datetime', 'widget'=>'choice', 'required'=>false, 'data'=>$a->getDob()))
				->add('gender', 'choice', array('choices'=>array('1'=>'Male', '2'=>'Female'), 'multiple'=>FALSE, 'expanded'=>TRUE, 'data'=>$a->getGender()))
				->add('martialstatus', 'choice', array('choices'=>array('Single'=>'Single', 'Married'=>'Married', 'Divorced'=>'Divored'), 'multiple'=>FALSE, 'expanded'=>TRUE, 'data'=>$a->getMartialStatus()))
				->add('mobile1', 'text', array('required'=>False, 'data'=>$a->getMobile1()))
				->add('mobile2', 'text', array('required'=>False, 'data'=>$a->getMobile2()))
				->add('country_residence', 'text', array('required'=>FAlSE, 'data'=>$a->getCountryResidence()))
				->add('country_present', 'text', array('required'=>FAlSE, 'data'=>$a->getCountryPresent()))
				->add('state_residence', 'text', array('required'=>FALSE, 'data'=>$a->getStateResidence()))
				->add('state_present', 'text', array('required'=>FALSE, 'data'=>$a->getStatePresent()))
				->add('city_residence', 'text', array('required'=>FALSE, 'data'=>$a->getCityResidence()))
				->add('city_present', 'text', array('required'=>FALSE, 'data'=>$a->getCityPresent()))
				->add('submit', 'submit')
				->getForm();
			}
	
		$form->handleRequest($request);
		if($request->isMethod('POST')){
			if($form->isValid()) {
				$firstname = $form['firstname']->getData();
				$lastname = $form['lastname']->getData();
				$dob = $form['dob']->getData();
				$gender = $form['gender']->getData();
				$martialstatus = $form['martialstatus']->getData();
				$mobile1 = $form['mobile1']->getData();
				$mobile2 = $form['mobile2']->getData();
				$countryresidence = $form['country_residence']->getData();
				$countrypresent = $form['country_present']->getData();
				$stateresidence = $form['state_residence']->getData();
				$statepresent = $form['state_present']->getData();
				$cityresidence = $form['city_residence']->getData();
				$citypresent = $form['city_present']->getData();

				$account = $em->getRepository('TreeTreeBundle:Account')->find($accountid);

				$account->setFirstname($firstname);
				$account->setLastname($lastname);
				$account->setDob($dob);
				$account->setGender($gender);
				$account->setMartialStatus($martialstatus);
				$account->setMobile1($mobile1);
				$account->setMobile2($mobile2);
				$account->setCountryResidence($countryresidence);
				$account->setCountryPresent($countrypresent);
				$account->setStateResidence($stateresidence);
				$account->setStatePresent($statepresent);
				$account->setCityResidence($cityresidence);
				$account->setCityPresent($citypresent);

				$em->flush();

				if($attempt == 1)
					return $this->redirect($this->generateUrl('tree_tree_mytree'));
				else 
					return $this->redirect($this->generateUrl('tree_tree_myprofile'));
			}
			else {
				return $this->render('TreeTreeBundle:User:updateprofile.html.twig', array('form'=>$form->createView()));
			}
		}
		
		return $this->render('TreeTreeBundle:User:updateprofile.html.twig', array('form'=>$form->createView()));
	}

	public function changepasswordAction($sessionhash, $attempt, Request $request)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();
		
		$myhash = $session->get('sessionhash');	
		if($myhash == $sessionhash){
			$user = new User();

			$form = $this->createFormBuilder($user)
				->add('password', 'repeated', array('type'=>'password', 'invalid_message'=>'Password fields must match', 'first_options'=>array('label'=>'Password', 'attr'=>array('class'=>'form-control')), 'second_options'=>array('label'=>'Confirm Password', 'attr'=>array('class'=>'form-control'))))
				->add('submit', 'submit', array('attr'=>array('class'=>'btn btn-primary  btn-block')))
				->getForm();

			$form->handleRequest($request);

			if($request->isMethod('POST')){
				if($form->isValid()){
					$password = md5($form['password']->getData());

					$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('sessionhash'=>$sessionhash));
					
					foreach($userArray as $u){
						$uid = $u->getId();
					}

					$user = $em->getRepository('TreeTreeBundle:User')->find($uid);

					$user->setPassword($password);
					
					$em->flush();
				
					if($attempt == 1)	
						return $this->redirect($this->generateUrl('tree_tree_mytree'));
					else{
						$session->getFlashBag()->add('success', 'Password updated 3 seconds ago.');
						
						return $this->redirect($this->generateUrl('tree_tree_mysettings'));
					}
					
				}
				else 
					return $this->render('TreeTreeBundle:User:changepassword.html.twig', array('form'=>$form->createView(), 'attempt'=>$attempt));
			}
			
			return $this->render('TreeTreeBundle:User:changepassword.html.twig', array('form'=>$form->createView(), 'attempt'=>$attempt));
		}
		else {
			$session->getFlashBag()->add('error', 'An uninteded action was triggered. Please contact the administrator');
			
			return $this->render('::base_error.html.twig');
		}
	}
	
	public function emailactivationAction($userid, $userhash)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();
					
		$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('id'=>$userid, 'userhash'=>$userhash));
		
		foreach($userArray as $u){
			$uid = $u->getId();
		}

		if(isset($uid)){
			$user = $em->getRepository('TreeTreeBundle:User')->find($uid);			

			$sessionid = $this->generateRandom(7);
			$sessionhash = $this->generateHash(16);
			$today = new \Datetime();
			$ip = $this->container->get('request')->getClientIp();
			
			$newhash = "";
			$user->setUserhash($newhash);
			$user->setStatus(1);
			$user->setSessionid($sessionid);
			$user->setSessionhash($sessionhash);
			$user->setLastAccess($today);
			$user->setLastAccessIp($ip);			
			$em->flush();
			
			$email = $user->getEmail();
			$pid = 8;
			
			$accountArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$uid));

			foreach($accountArray as $a){
				$accountid = $a->getId();
			}
			
			$account = $em->getRepository('TreeTreeBundle:Account')->find($accountid);

			$account->setUserprofileid(8);

			$em->flush();

			$session->set('uid', $uid);
			$session->set('sessionid', $sessionid);
			$session->set('sessionhash', $sessionhash);
			$session->set('pid', $pid);
			$session->set('email', $email);
			
			$session->getFlashBag()->add('success','Your account has been activated. Please change your password to proceed further.');
			return $this->redirect($this->generateUrl('tree_tree_member_change_password', array('sessionhash'=>$sessionhash, 'attempt'=>1)));
		}
		else {
			$session->getFlashBag()->add('error','Action failed due to some technical flaw. Please contact the administrator.');
	
			return $this->render('::base_error.html.twig');
		}
	}

	public function addnodeAction($nodeid, $relationid, $relnodeid,  Request $request)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();

		$user = new User();

		if($relnodid == 0){
			$form = $this->createFormBuilder($user)
				->add('email', 'email')
				->add('firstname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE))
				->add('lastname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE))
				->add('submit', 'submit')
				->getForm();
		
			$form->handleRequest($request);

			if($request->isMethod('POST')){
				if($form->isValid()){
					$email = $form['email']->getData();
					$firstname = $form['firstname']->getData();
					$lastname = $form['lastname']->getData();
					
					if(!ctype_alpha($firstname)){
						$session->getFlashBag()->add('error', 'Please enter a valid Firstname');
						return $this->render('TreeTreeBundle:User:addconnection.html.twig', array('form'=>$form->createView()));
					}
				
					if(!ctype_alpha($lastname)){
                                        	$session->getFlashBag()->add('error', 'Please enter a valid Lastname');
                                        	return $this->render('TreeTreeBundle:User:addconnection.html.twig', array('form'=>$form->createView()));
                                	}

					$accountArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('firstname'=>$firstname, 'lastname'=>$lastname));
				
					foreach($accountArray as $a){
						$accountid = $a->getId();
					}

					if(isset($accountid)){
						return $this->render('TreeTreeBundle:User:node1.html.twig', array('accouts'=>$accountArray));
					}
					else{
						switch($relationid){
							case 1: $position = 1;
							case 2: $position = 1;
							case 3: $position = 2;
							case 4: $position = 2;
							case 5: $position = 2;
							case 6: $position = 2;
							case 7: $position = 3;
							case 8: $position = 3;
						}
						$user = new User();
	
						$user->setEmail($email);
						
						$em->persist($user);
						$em->flush();

						$userid = $user->getId();

						$account = new Account();

						$account->setFirstname($firstname);
						$account->setLastname($lastname);
						$account->setUserid($userid);
						$account->setProfileid(8);

						$em->persist($account);
						$em->flush();
						
						$tree = new Tree();

						$tree->setNodeid($nodeid);						
						$tree->setRelnodeid($userid);
						$tree->setPposition($position);
						$tree->setRelationid($relationid);

						$em->persist($tree);
						$em->flush();
					
						$session->getFlashBag()->add('success', 'A node was successfully attached to your tree');	
						return $this->redirect($this->generateUrl('tree_tree_mytree'));
					}
				}
				else {
					return $this->render('TreeTreeBundle:User:addconnection.html.twig', array('form'=>$form->createView()));
				}
				
			}
		
			return $this->render('TreeTreeBundle:User:addconnection.html.twig', array('form'=>$form->createView()));
		}
		else {
			$tree = new Tree();

                        $tree->setNodeid($nodeid);                
                        $tree->setRelnodeid($relnodeid);
                        $tree->setPposition($position);
                        $tree->setRelationid($relationid);

                        $em->persist($tree);
                        $em->flush();

                        $session->getFlashBag()->add('success', 'A node was successfully attached to your tree');
                        return $this->redirect($this->generateUrl('tree_tree_mytree'));
	
		}
				
			
	}

	public function logoutAction()
	{
		
		$session = $this->container->get('session');
		
		$em = $this->getDoctrine()->getManager();
	
		$uid = $session->get('uid');
		$sessionaccessid = $session->get('sessionaccessid');
		$sessionipid = $session->get('sessionipid');
		
		$today = new \Datetime();
		$ip = iptolong($this->container->get('request')->server('REMOTE_ADDR'));

		$accessrel = $em->getRepository('TreeTreeBundle:Usertoaccessrel')->find($sessionaccessid);			
		
		$accessrel->setLogout_access($today);

		$em->flush();

		$iprel = $em->getRepository('TreeTreeBundle:Usertoiprel')->find($sessionipid);		
		
		$iprel->setLogout_ip($ip);

		$em->flush();

		$session->inValidate();

		return $this->redirect($this->generateUrl('tree_tree_mytree'));
		
		
	}

	public function loginAction(Request $request)
	{
		$session = $this->container->get('session');

		$user = new User();

		$form = $this->createFormBuilder($user)
			->add('email','email', array('trim'=>TRUE))
			->add('password', 'password')
			->add('rememerme', 'choice', array('mapped'=>FALSE, 'required'=>FALSE, 'multiple'=>TRUE, 'expanded'=>TRUE, 'choices'=>array('1'=>'Remeber Me')))
			->add('submit', 'submit')
			->getForm();
		
		$form->handleRequest($request);
		
		if($request->isMethod('POST')){
			if($form->isValid()){
				$email = $form['email']->getData();
				$password = md5($form['password']->getData());
				
				$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email, 'password'=>$password));
				foreach($userArray as $u){
					$uid = $u->getId();
				}
				
				if(isset($uid)){

					$user = $em->getRepository('TreeTreeBundle:User')->find($uid);

					$status = $user->getStatus();
					if($status == 1){
						$newhash = $this->generateHash(16);
						$sessionid = $this->generateRandom(7);
						$sessionhash = $this->generateHash(16);
						$today = new \Datetime();
						$ip = iptolong($this->container->get('request')->server('REMOTE_ADDR'));

						$query = $em->createQueryBuilder()
							->select('count(ua.id)')
							->from('TreeTreeBundle:Usertoaccessrel', 'ua')
							->where('ua.userid = :userid')
							->setParameter('userid', $uid);

						$accesscount = $query->getQuery()->getSingleScalarResult();

						if($accesscount >= 15){			
							$query = $em->createQueryBuilder()
								->select('ua.id')
								->from('TreeTreeBundle:Usertoaccessrel', 'ua')
								->where('ua.userid = :userid')
								->add('orderBy', 'ua.id')
								->setFirstResult(0)
								->setMaxResults(1)
								->setParameter('userid', $uid);

							$accessArray = $query->getQuery()->getArrayResults();
							
							$accessid = $accessArray[0]['id'];

							$accessrel = $em->getRepository('TreeTreeBundle:Usertoaccessrel')->find($accessid);
							
							$em->remove($accessrel);
							
							$em->flush();
						}
					
						$usertoaccessrel = new Usertoacessrel();
						
						$usertoaccessrel->setUserid($uid);
						$usertoaccessrel->setLogin_time($today);

						$sessionaccessid = $usertoaccessrel->getId();

						$em->persist($usertoaccessrel);						
						$em->flush();
						
						$ipquery = $em->createQueryBuilder()
                                                        ->select('count(ui.id)')
                                                        ->from('TreeTreeBundle:Usertoiprel', 'ui')
                                                        ->where('ui.userid = :userid')
                                                        ->setParameter('userid', $uid);

                                                $ipcount = $query->getQuery()->getSingleScalarResult();

                                                if($ipcount >= 15){
                                                        $query = $em->createQueryBuilder()
                                                                ->select('ui.id')
                                                                ->from('TreeTreeBundle:Usertoiprel', 'ui')
                                                                ->where('ui.userid = :userid')
                                                                ->add('orderBy', 'ui.id')
                                                                ->setFirstResult(0)
                                                                ->setMaxResults(1)
                                                                ->setParameter('userid', $uid);

                                                        $ipArray = $query->getQuery()->getArrayResults();

                                                        $ipid = $ipArray[0]['id'];

                                                        $iprel = $em->getRepository('TreeTreeBundle:Usertoiprel')->find($ipid);

                                                        $em->remove($iprel);

                                                        $em->flush();
                                                }

                                                $usertoiprel = new Usertoiprel();

                                                $usertoiprel->setUserid($uid);
                                                $usertoiprel->setLogin_ip($ip);

                                                $sessionipid = $usertoiprel->getId();

                                                $em->persist($usertoiprel);
                                                $em->flush();
					
						$accontArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$uid));
						
						foreach($accountArray as $a){
							$profileid = $a->getUserprofileid();
						}
						
						$session->set('uid', $uid);
						$session->set('email', $email);
						$session->set('sessionid', $sessionid);
						$session->set('sessionhash', $sessionhash);
						$session->set('pid', $profileid);
						$session->set('sessionaccessid', $sessionaccessid);
						$session->set('sessionipid', $sessionipid);

						return $this->redirect($this->generateUrl('tree_tree_mytree'));
					}
					else {
						switch($status){
							case 0:
								return $this->render('TreeTreeBundle:Statictemplates:techinical_login_error.html.twig');
							case 2:
                                                                return $this->render('TreeTReeBundle:Statictemplates:admin_block_user.html.twig');
						}
					}					
				}
				else {
					$session->getFlashBag()->add('error', 'Email and Pasword dod not match');
					
					return $this->render('TreeTreeBundle:User:login.html.twig', array('form'=>$form->createView()));
				}
			}
			else{
				return $this->render('TreeTreeBundle:User:login.html.twig', array('form'=>$form->createView()));
			}
		}
			
		return $this->render('TreeTreeBundle:User:login.html.twig', array('form'=>$form->createView()));
	}
		
	public function smsresendAction($userhash)
	{
		$em = $this->getDoctrine()->getManager();

		$logger = $this->container->get('logger');

		$user = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findByUserhash($userhash);

		$uid = $user->getId();

		if(isset($uid)){
			
			$user = $em->getRepository('TreeTreeBundle:User')->find($uid);

			$newhash = $this->generateHash(16);
			$mobilecode = $this->generateRandom(7);

			$user->setUserhash($newhash);
			$user->setMobilecode($mobilecode);
			
			$em->flush();

			return $this->redirect($this->generateUrl('tree_tree_sms_verify', array('mobilecode'=>$mobilecode, 'userhash'=>$newhash)));	
		}
		else {
			$ip = $this->container->get('request')->server('REMOTE_ADDR');
			
			$message = new \Datetime(). "Access Violation detected from ". $ip; 

			$logger->error($message);
		}
	}

	public function smsverifyAction($mobilecode, $userhash, $attempt, Request $request)
	{
		$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('mobilecode'=>$mobilecode, 'userhash'=>$userhash));
		
		foreach($userArray as $u){
			$uid = $u->getId();
		}

		if(isset($uid)){
			$user = new User();

			$form = $this->createFormBuilder($user)
				->add('smscode', 'text', array('trim'=>TRUE, 'max_length'=>7, 'mapped'=>FALSE))
				->add('submit','submit')
				->getForm();

			$form->handleRequest($request);
			
			if($request->isMethod('POST')){
				if($form->isValid()){
					$smscode = $form['smscode']->getData();
				
					if($smscode == $mobilecode){
						$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('userhash'=>$userhash));
						
						foreach($userArray as $u){
							$uid = $u->getId();
						}
				
						$newhash = $this->generateHash(16);

						$em = $this->getDoctrine()->getManager();

						$user = $em->getRepository('TreeTreeBundle:User')->find($uid);
					
						$user->setStatus(1);							
						$user->setUserhash($newhash);					
						$em->flush();

						if($attempt == 1){
							$em = $this->getDoctrine()->getManager();

                                                        $user = $em->getRepository('TreeTreeBundle:User')->find($uid);

							$sessionid = $this->generateRandom(7);
							$sessionhash = $this->generateHash(16);
							$today = new \Datetime();
							$ip = iptolong($this->container->get('request')->server->get("REMOTE_ADDR"));
							
							$user->setSessionid($sessionid);	
							$user->setSessionHash($sessionhash);
							$user->setLast_access($today);
							$user->setLast_access_ip($ip);
							
							$em->flush();
							
							$query = $em->createQueryBuilder()
									->select('count(ua.id)')
									->from('TreeTreeBundle:User', 'ua')
									->where('ua.userid = :userid')
									->setParameter($userid, $uid);

							$usertoaccesscount = $query->getQuery()->getSingleScalarResult();

							if($usertoaccesscount >= 15){
								$query = $em->createQueryBuilder()
                                                                        ->select('ua.id')
                                                                        ->from('TreeTreeBundle:User', 'ua')
                                                                        ->where('ua.userid = :userid')
									->add('orderBy', 'ua.id')
									->setFirstResult(1)
									->setMaxResults(1)
                                                                        ->setParameter($userid, $uid);
	
								$usertoaccessrelArray = $query->getQuery()->getArrayResult();

								$usertoaccessreldelid = $usertoaccessrelArray[0]['id'];

								$em = $this->getDoctrine()->getManager();
								
								$usertoaccessrelrow = $em->getRepository('TreeTreeBundle:Usettoaccessrel')->find($usertoaccessreldelid);
								$em->remove($usertoaccessrelrow);

								$em->flush();
							}
							
							$em = $this->getDoctrine()->getManager();

							$usertoaccessrel = new Usertoaccessrel();

							$usertoaccessrel->setUserid($uid);
							$usertoaccessrel->setLogin_time($today);

							$em->persist($usertoaccessrel);
							$em->flush();
								
							$sessionaccessloginid = $usertoaccessrel->getId();

							$usertoiprel = new Usertoiprel();

							$usertoiprel->setUserid($uid);
							$usertoiprel->setLogin_ip($ip);
							
							$em->persist($usertoiprel);

							$em->flush();

							$sessioniploginrel = $usertoiprel->getId();

							$session = $this->container()->get('session');

							$user = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->find($uid);
							
							$session->set('uid', $uid);
							$session->set('pid', 6);
							$session->set('email', $user->getEmail() );
							$session->set('userhash', $user->getUserhash());
							$session->set('sessionid', $user->getSessionid());
							$session->set('sessionhash', $user->getSessionhash());
							
							return $this->redirect($this->generateUrl('tree_tree_profile_update'));
							
						} 
						else {
						}
					}
					else{
						$session = $this->container->get('session');

						$session->getFlashBag()->add('error','Code entered is not valid');
					
						return $this->render('TreeTreeBundle:User:smsverify.html.twig', array('mobilecode'=>$mobilecode, 'form'=>$form->createView()));
					}
				}
				else{
					return $this->render('TreeTreeBundle:User:smsverify.html.twig', array('mobilecode'=>$mobilecode, 'form'=>$form->createView()));
		
				}
			}
			return $this->render('TreeTreeBundle:User:smsverify.html.twig', array('mobilecode'=>$mobilecode, 'form'=>$form->createView()));
		}
		else {
			//Put your logs in here
			
			$logger = $this->container->get('logger');

			$ip = $this->container->get('request')->server->get("REMOTE_ADDR");

			$message = date('Y-m-d')." Undefined action detected. Tried to access smsverify with unknown parameters. Action detected from ". $ip;

			$logger->error($message);

			$session = $this->container->get('session');

                        $session->getFlashBag()->add('error','Inappropriate Action');

			return $this->render('base_error.html.twig');

		}
	}

	public function mytreeAction($nodeid)
	{
 	/*	$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();

		if($nodeid == 0)
                        $nodeid = $session->get('uid');

		$query = $em->createQuery(
			'SELECT t
                      	 FROM TreeTreeBundle:Tree t
                         WHERE t.nodeid = :nodeid OR
     			 t.relnodeid = :nodeid
			')->setParameter('nodeid', $nodeid);
	
		$tree = $query->getResult(); */
		
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();
		
		$tree = array();

		if($nodeid == 0)
			$nodeid = $session->get('uid');
		
		$query = $em->createQueryBuilder()
			->select('t.relationid, t.id')
			->from('TreeTreeBundle:Tree', 't')
			->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 1')
			->setParameter('nodeid', $nodeid);

		$toptree = $query->getQuery()->getResult();

		$query = $em->createQueryBuilder()
                        ->select('count(t.id)')
                        ->from('TreeTreeBundle:Tree', 't')
                      	->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 1')
                        ->setParameter('nodeid', $nodeid);

		$toptreecount = $query->getQuery()->getSingleScalarResult();

		for($i = 0; $i < $toptreecount; $i++){
			$tree[1][$i]['relationid'] = $toptree[$i]['relationid'];
			$tree[1][$i]['id'] = $toptree[$i]['relationid'];
		}
		
		$query = $em->createQueryBuilder()
                        ->select('t.relationid, t.id')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 2')
                        ->setParameter('nodeid', $nodeid);

                $parelleltree = $query->getQuery()->getResult();

                $query = $em->createQueryBuilder()
                        ->select('count(t.id)')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 2')
                        ->setParameter('nodeid', $nodeid);

       		$parelleltreecount = $query->getQuery()->getSingleScalarResult();

		

		for($i = 0; $i < $parelleltreecount; $i++){
			if($parelleltree[$i]['relationid'] == 0){
				 $tree[2][$i]['relationid'] = $parelleltree[$i]['relationid'];
        	                 $tree[2][$i]['id'] = $parelleltree[$i]['relationid'];
			}
		}

		for($i = 0; $i < $parelleltreecount; $i++){
			if($parelleltree[$i]['relationid'] == 3 || $parelleltree[$i]['relationid'] == 8){
	                               	$tree[2][$i]['relationid'] = $parelleltree[$i]['relationid'];
        				$tree[2][$i]['id'] = $parelleltree[$i]['relationid'];
			}
                }


/*                for($i = 0; $i < $parelleltreecount; $i++){
			if($parelleltree[$i]['relationid']!=0 && $parelleltree[$i]['relationid']!=8 && $parelleltree[$i]['relationid']!=3 ){
                        $tree[4][$i]['relationid'] = $parelleltree[$i]['relationid'];
			 $tree[4][$i]['id'] = $parelleltree[$i]['relationid'];
			}
                } */

		$query = $em->createQueryBuilder()
                        ->select('t.relationid, t.id')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 3')
                        ->setParameter('nodeid', $nodeid);

                $bottomtree = $query->getQuery()->getResult();

                $query = $em->createQueryBuilder()
                        ->select('count(t.id)')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 3')
                        ->setParameter('nodeid', $nodeid);

                $bottomtreecount = $query->getQuery()->getSingleScalarResult();

                for($i = 0; $i < $bottomtreecount; $i++){
                        $tree[3][$i]['relationid'] = $bottomtree[$i]['relationid'];
     			 $tree[3][$i]['id'] = $bottomtree[$i]['relationid'];

                }

		for($i = 0; $i < $parelleltreecount; $i++){
                        if($parelleltree[$i]['relationid']!=0 && $parelleltree[$i]['relationid']!=8 && $parelleltree[$i]['relationid']!=3 ){
                        $tree[4][$i]['relationid'] = $parelleltree[$i]['relationid'];
                         $tree[4][$i]['id'] = $parelleltree[$i]['relationid'];
                        }
                }

	
/*		$tree[1][0]['relationid']=1;
		$tree[1][0]['firstname']= 'Tom';
		$tree[1][1]['relationid']= 2;
		$tree[1][1]['firstname']= 'Jenny';
		$tree[2][0]['relationid']= 0;
                $tree[2][0]['firstname']= 'Matt';
		$tree[2][1]['relationid']= 3;
                $tree[2][1]['firstname']= 'Carlos';
		$tree[2][2]['relationid']= 4;
                $tree[2][2]['firstname']= 'Micheal';
		$tree[2][3]['relationid']= 5;
                $tree[2][3]['firstname']= 'Ana';
		$tree[2][4]['relationid']= 4;
                $tree[2][4]['firstname']= 'Sam';
		$tree[3][0]['relationid']= 6;
                $tree[3][0]['firstname']= 'Salman';
		$tree[3][1]['relationid']= 6;
                $tree[3][1]['firstname']= 'Andrew';
		$tree[3][2]['relationid']= 6;
                $tree[3][2]['firstname']= 'Mickey'; */
		
		return $this->render('TreeTreeBundle:User:mytree.html.twig', array('tree'=>$tree));
	}

	public function registerAction(Request $request)
	{
		$session = $this->container->get('session');
		
		if(!$session->has('uid')){
		$user = new User();

		$form = $this->createFormBuilder($user)
			->add('email', 'email', array('trim'=>TRUE))
			->add('password', 'repeated', array('type'=>'password', 'first_options'=>array('label'=>'Choose a Password'), 'second_options'=>array('label'=>'Confirm your Password'), 'invalid_message'=>'Password & confirm password did not match'))
			->add('mobile', 'text' ,array('max_length'=>10, 'mapped'=>FALSE))
			->add('submit', 'submit')
			->getForm();

		$form->handleRequest($request);

		if($request->isMethod('POST')){
			if($form->isValid()){			
				$email = $form['email']->getData();
				$password = $form['password']->getData();	
				//Password check goes here
				$mobile = $form['mobile']->getData();

				if($mobile!= "" && !is_numeric($mobile)){
					$session = $this->container->get('session');
					$session->getFlashBag()->add('error', 'Invalid Mobile Number. Mobile Number cannot contain strings');
					return $this->render('TreeTreeBundle:User:member_register.html.twig', array('form'=>$form->createView()));
				}
				
				if($mobile!== "" && strlen($mobile)!=10){
					$session = $this->container->get('session');
                                        $session->getFlashBag()->add('error', 'Invalid Mobile Number. Mobile Number cannot contain strings');
                                        return $this->render('TreeTreeBundle:User:member_register.html.twig', array('form'=>$form->createView()));
				}

				$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findByEmail($email);
				
				foreach($userArray as $u){
					$uid = $u->getId();
				}
			
				if(isset($uid)){
/*					$em = $this->getDoctrine()->getManager();

                                        $user = $em->getRepository('TreeTreeBundle:User')->find($uid);

                                        $sessionid = $this->generateRandom(7);
                                        $sessionhash = $this->generateHash(16);
                                        $today = new \Datetime();
					$ip = iptolong($this->container->get('request')->server->get("REMOTE_ADDR"));

                                        $user->setSessionid($sessionid);
                                        $user->setSessionHash($sessionhash);
                                        $user->setLast_access($today);
                                        $user->setLast_access_ip($ip);

                                        $em->flush();

					$em = $this->getDoctrine()->getManager();

                                        $usertoaccessrel = new Usertoaccessrel();

                                        $usertoaccessrel->setUserid($uid);
                                        $usertoaccessrel->setLogin_time($today);

                                        $em->persist($usertoaccessrel);
                                        $em->flush();

                                        $sessionaccessloginid = $usertoaccessrel->getId();

                                        $usertoiprel = new Usertoiprel();

                                        $usertoiprel->setUserid($uid);
                                        $usertoiprel->setLogin_ip($ip);

                                        $em->persist($usertoiprel);
                                        $em->flush();

					$sessioniploginrel = $usertoiprel->getId();

                                        $session = $this->container()->get('session');

                                        $user = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->find($uid);

                                        $session->set('uid', $uid);
                                        $session->set('pid', 6);
                                        $session->set('email', $user->getEmail() );
                                        $session->set('userhash', $user->getUserhash());
                                        $session->set('sessionid', $user->getSessionid());
                                        $session->set('sessionhash', $user->getSessionhash());

                                        return $this->redirect($this->generateUrl('tree_tree_profile_update'));
*/
					$em = $this->getDoctrine()->getManager();

                                        $user =  $em->getRepository('TreeTreeBundle:User')->find($uid);
                                        $account = new Account();

                                        $moblecode = $this->generateRandom(7);
                                        $today = new \Datetime();
                                        $newhash = $this->generateHash(16);

                                        $user->setPassword(md5($password));
                                        $user->setMobilecode($mobilecode);
                                        $user->setCreated($today);
                                        $user->setUpdated($today);
                                        $user->status(0);
                                        $user->setUserhash($newhash);

                                        $em->flush();

                                        $account = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findByUserid($uid);

					$accountid = $account->getId();

					$account = $em->getRepository('TreeTreeBundle:Account')->find($accountid);
                                        $account->setMobile1(md5($mobile));
                                      
					$em->flush();
				
					$message = \Swift_Message::newInstance()
                                                ->setSubject('Parivartree : Welcoming Email')
                                                ->setFrom($adminemail)
                                                ->setTo($email)
                                                ->setContentType("text/html")
                                                ->setBody($this->render('TreeTreeBundle:Emailtemplates:welcome_email.html.twig'));

                                        $this->get('mailer')->send($message);

                                        return $this->redirect($this->generateUrl('tree_tree_sms_verify', array('mobilecode'=>$mobilecode, 'userid'=>$userid)));

				}
				else {
					$em = $this->getDoctrine()->getManager();

					$user =  new User();
					$account = new Account();
				
					$moblecode = $this->generateRandom(7);
					$today = new \Datetime();
					$newhash = $this->generateHash(16);					
						
					$user->setEmail($email);
					$user->setPassword(md5($password));
					$user->setMobilecode($mobilecode);	
					$user->setCreated($today);
					$user->setUpdated($today);	
					$user->status(0);
					$user->setUserhash($newhash);

					$em->persist($user);
					$em->flush();

					$userid = $user->getId();

					$account = new Account();
					
					$account->setMobile1(md5($mobile));
					$account->setUserid($userid);
					$account->setUserprofileid(8);
					
					$em->persist($account);
					$em->flush();		

					$message = \Swift_Message::newInstance()
						->setSubject('Parivartree : Welcoming Email')		
						->setFrom($adminemail)	
						->setTo($email)
						->setContentType("text/html")
						->setBody($this->render('TreeTreeBundle:Emailtemplates:welcome_email.html.twig'));

					$this->get('mailer')->send($message);
					
					return $this->redirect($this->generateUrl('tree_tree_sms_verify', array('mobilecode'=>$mobilecode, 'userid'=>$userid)));
				}
			}
			else {
				return $this->render('TreeTreeBundle:User:member_register.html.twig', array('form'=>$form->createView()));
			}
		}

		return $this->render('TreeTreeBundle:User:member_register.html.twig', array('form'=>$form->createView()));
		}
		else {
			//Write to logs logic goes here
			return $this->redirect($this->generateUrl('tree_tree_mytree'));
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

		foreach($userArray as $u){
			$uid = $u->getId();
		}

		if(isset($uid))
			$this->generateHash(16);
		else
	                return $randomString;
        }

}


?>
