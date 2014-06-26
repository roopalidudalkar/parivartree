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
use Tree\TreeBundle\Entity\Loginattempthistory;
use Tree\TreeBundle\Entity\Userblockfromchatrel;
use Tree\TreeBundle\Entity\Tree;

class UserController extends Controller
{
	public function blockfromchatAction($userid)
        {
                $session = $this->container->get('session');
                $em = $this->getDoctrine()->getManager();

                $uid = $session->get('uid');

                $blockchat = new Userblockfromchatrel();

                $blockchat->setUserid($uid);
                $blockchat->setRelid($userid);

                $em->persist($blockchat);
                $em->flush();

                return $this->redirect($this->generateUrl('tree_tree_settings'));
        }

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
				->add('firstname', 'text', array('required'=>False,'data'=>$a->getFirstname()))
				->add('lastname', 'text', array('required'=>False,'data'=>$a->getLastname()))
				->add('dob','date', array('required'=>False,'input'=>'datetime', 'widget'=>'choice', 'required'=>false, 'data'=>$a->getDob()))
				->add('gender', 'choice', array('required'=>False,'choices'=>array('1'=>'Male', '2'=>'Female'), 'multiple'=>FALSE, 'expanded'=>TRUE, 'data'=>$a->getGender()))
				->add('city','text',array('required'=>False,'data'=>$a->getCity()))
				->add('locality','text',array('required'=>False,'data'=>$a->getLocality()))
				->add('state','text',array('required'=>False,'data'=>$a->getState()))
				->add('country','text',array('required'=>False,'data'=>$a->getCountry()))
				->add('pin','text',array('required'=>False,'data'=>$a->getPin()))
				->add('hometown','text',array('required'=>False,'data'=>$a->getHometown()))
				->add('mobile','text',array('required'=>False,'data'=>$a->getMobile()))
				->add('martialstatus', 'choice', array('choices'=>array('Single'=>'Single', 'Married'=>'Married', 'Divorced'=>'Divored'), 'multiple'=>FALSE, 'expanded'=>TRUE, 'data'=>$a->getMaritalStatus()))
				->add('wedding_date', 'date', array('required'=>False,'data'=>$a->getWeddingDate()))
				->add('gothra', 'text', array('required'=>False, 'data'=>$a->getGothra()))
				->add('religion', 'text', array('required'=>FAlSE, 'data'=>$a->getReligion()))
				->add('community', 'text', array('required'=>FAlSE, 'data'=>$a->getCommunity()))
				->add('profession', 'text', array('required'=>FALSE, 'data'=>$a->getProfession()))
				->add('state_present', 'text', array('required'=>FALSE, 'data'=>$a->getStatePresent()))
				->add('city_residence', 'text', array('required'=>FALSE, 'data'=>$a->getCityResidence()))
				->add('city', 'text', array('required'=>FALSE, 'data'=>$a->getCity()))
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
				$martialstatus = $form['marital_status']->getData();
				$mobile1 = $form['mobile1']->getData();
				$mobile2 = $form['mobile2']->getData();
				$countryresidence = $form['country_residence']->getData();
				$countrypresent = $form['country_present']->getData();
				$stateresidence = $form['state_residence']->getData();
				$statepresent = $form['state_present']->getData();
				$cityresidence = $form['city_residence']->getData();
				$citypresent = $form['city']->getData();

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
			$email = $u->getEmail();
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
				$fname = $a->getFirstname();
				$lname = $a->getLastname();
				$gender = $a->getGender();
			}
			
			$account = $em->getRepository('TreeTreeBundle:Account')->find($accountid);

			$account->setUserprofileid(8);

			$em->flush();
			
			$session->set('uid',$uid);
                        $session->set('email', $email);
                        $session->set('sessionid', $sessionid);
                        $session->set('name', $fname." ".$lname);
                        $session->set('sessionhash', $sessionhash);
                        $session->set('pid', 8);
			$session->set('gender', $gender);
                 	$_SESSION['chatuser']= $uid;
                        $_SESSION['chatuser_name']= $fname." ".$lname;
			
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
				->add('email', 'email',array('attr'=>array('class'=>'form-control')))
				->add('firstname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE, array('attr'=>array('class'=>'form-control'))))
				->add('lastname', 'text', array('trim'=>TRUE, 'mapped'=>FALSE,array('attr'=>array('class'=>'form-control'))))
				->add('submit', 'submit' , array(array('attr'=>array('class'=>'btn btn-primay'))))
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

	public function rollbackAction()
	{
		$session = $this->container->get('session');
		
		/*$em = $this->getDoctrine()->getManager();
	
		$uid = $session->get('uid');
		$sessionaccessid = $session->get('sessionaccessid');
		$sessionipid = $session->get('sessionipid');
		
		$today = new \Datetime();
		$ip = $this->container->get('request')->getClientIp();

		$accessrel = $em->getRepository('TreeTreeBundle:Usertoaccessrel')->find($sessionaccessid);			
		
		$accessrel->setLogoutTime($today);

		$em->flush();

		$iprel = $em->getRepository('TreeTreeBundle:Usertoiprel')->find($sessionipid);		
		
		$iprel->setLogoutIp($ip);

		$em->flush();
		*/

		$session->inValidate();
		
		return $this->redirect($this->generateUrl('tree_tree_homepage'));
	}

	public function logoutAction()
	{	
		$session = $this->container->get('session');
			
		$session->inValidate();

		return $this->redirect($this->generateUrl('tree_tree_homepage'));
	}

	public function captureLoginAttemptHistory($id)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getmanager();

		$now = new \Datetime();
		$ip = $this->container->get('request')->getClientIP();	

		$attempt = new Loginattempthistory();

		$attempt->setUserid($id);
		$attempt->setAttempted($now);
		$attempt->setIp($ip);

		$em->persist($attempt);
		$em->flush();

		return 1;
	}

	public function loginAction(Request $request)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();

		$params = $this->getRequest()->request->all();
		$email = $params['form']['email'];
		$password = md5($params['form']['password']);
		
		$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email, 'password'=>$password));	

		foreach($userArray as $u){
			$id = $u->getId();
			$status = $u->getStatus();
		}
                
		if(isset($id)){
			if($status == 1){
				$userhash = $this->generateHash(16);
				$sessionid = $this->generateRandom(7);
				$sessionhash = $this->generateHash(16);
				$now = new \Datetime();
				$ip = $this->container->get('request')->getClientIp();	
				$violationrule = "";
				
				$user = $em->getRepository('TreeTreeBundle:User')->find($id);

				$user->setUserhash($userhash);
				$user->setSessionid($sessionid);
				$user->setSessionhash($sessionhash);
				$user->setLastAccess($now);
				$user->setLastAccessIp($ip);
				$user->setLoginStatus(1);
				$user->setLogincount(0);
				$user->setViolationrule($violationrule);
				$user->setMobilecode(0);

				$em->flush();

				$useraccess  = new Usertoaccessrel();

				$useraccess->setUserid($id);
				$useraccess->setLoginTime($now);

				$em->persist($useraccess);
				$em->flush();

				$sessionuseraccess = $useraccess->getId();
			
				$userip = new Usertoiprel();
				
				$userip->setUserid($id);
				$userip->setLoginIp($ip);
	
				$em->persist($userip);
				$em->flush();

				$sessionuserip = $userip->getId();

				$account = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$id));

				foreach($account as $a){
					$accountid = $a->getId();
					$profileid = $a->getUserprofileid();
					$fname = $a->getFirstname();
					$lname = $a->getLastname();
					$gender = $a->getGender();
				}

				$session->set('uid',$id);
				$session->set('email', $email);
				$session->set('sessionid', $sessionid);
				$session->set('name', $fname." ".$lname);
				$session->set('sessionhash', $sessionhash);
				$session->set('pid', $profileid);
				$session->set('sessionipid', $sessionuserip);
				$session->set('sessionaccessid', $sessionuseraccess);
				$session->set('gender', $gender);
				$_SESSION['chatuser']= $id;
				$_SESSION['chatuser_name']= $fname." ".$lname;
				return $this->redirect($this->generateUrl('tree_tree_mytree'));
				
			} else if($status == 4) {
				$session->getFlashBag()->add('error', 'Your account has been blocked for crossing maxinmum authenticattion failure attempts! Please forgot password to re-generate your password.');

                                return $this->redirect($this->generateUrl('tree_tree_homepage'));
			}
			else if($status == 0){
				$session->getFlashBag()->add('error', 'Your account has been deactivated. Please contact the administrator!!');

                                return $this->redirect($this->generateUrl('tree_tree_homepage'));
			}
		}
		else {
			$userArray = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email));

			foreach($userArray as $u){
				$id = $u->getid();
				$logincount = $u->getLogincount();
			}
			

			if(isset($id)){
				if($logincount < 4){
					$newcount = $logincount + 1;
					
					$user = $em->getRepository('TreeTreeBundle:User')->find($id);
					
					$user->setLogincount($newcount);
		
					$em->flush();

					$getAttempt = $this->captureLoginAttemptHistory($id);

					if($newcount == 4)
						$session->getFlashBag()->add('error', 'Authentication Failed! Please check your username password!  This is your fourth consecutive authenticattion failure. ONe more attempt, and you shall be blocked from accessing the system');
					else
						$session->getFlashBag()->add('error', 'Authentication Failed! Please check your username password!');
						
					return $this->redirect($this->generateUrl('tree_tree_homepage'));
				}
				else {
					$newcount = $logincount + 1;

                                        $user = $em->getRepository('TreeTreeBundle:User')->find($id);

					$now = new \Datetime();

                                        $user->setLogincount($newcount);
					$user->setStatus(4);
					$user->setViolationrule('Login attempt failure count set to 5');
					$user->setUpdated($now);
                                        $em->flush();

                                        $getAttempt = $this->captureLoginAttemptHistory($id);

					$session->getFlashBag()->add('error', 'Authentication Failed! Please check your username password! Your account has been blocked for 5 continous authentication failure attempts. ');
					
					return $this->redirect($this->generateUrl('tree_tree_homepage'));
				}			
			}
			else {
				$session->getFlashBag()->add('error', 'Authentication Failed! Please check your username password!');
			
				return $this->redirect($this->generateUrl('tree_tree_homepage'));
			}
		}
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
			

		$em = $this->getDoctrine()->getManager();
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
						if($attempt == 1){
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

	protected function buildCommunityChoices()
        {
           $choices          = array();
           $em = $this->getDoctrine()->getManager();
                 $query = $em->createQueryBuilder()
                         ->select('r.id,r.parameter')
                         ->from('AdminAdminBundle:Religiontogothrarel','r')
                         ->where('r.religionid != 0')
                         ->andwhere('r.communityid = 0')
                         ->andwhere('r.status = 1');
                 $data = $query->getQuery()->getResult();

                $query = $em->createQueryBuilder()
                        ->select('count(r.id)')
                        ->from('AdminAdminBundle:Religiontogothrarel', 'r')
                        ->where('r.religionid != 0')
                        ->andwhere('r.communityid = 0')
                        ->andWhere('r.status = 1');

                $count = $query->getQuery()->getSingleScalarResult();

                for($i = 0; $i < $count; $i++ )
                {
                        $choices[$data[$i]['id']] = $data[$i]['parameter'];
                }

        return $choices;
	}


	public function mytreeAction($nodeid, Request $request)
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
		
		$user = new User();
		
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();
		
		$tree = array();

		$form = $this->createFormBuilder($user)
				->add('search','text',array('required'=>FALSE,'mapped'=>false,'attr'=>array('class'=>'user-search','id'=>'form_search','placeholder'=>'Search for people, place and community.')))
                                ->add('email', 'email', array('required'=>FALSE,'trim'=>TRUE, 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control')))
                                ->add('firstname', 'text', array('trim'=>TRUE,'label'=>'First Name', 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control')))
                                ->add('lastname', 'text', array('required'=>FALSE,'label'=>'Last Name','trim'=>TRUE, 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control')))
				->add('mobile','text',array('required'=>FALSE,'label'=>'Mobile Number','trim'=>TRUE, 'mapped'=>FALSE, 'attr'=>array('class'=>'form-control')))
				->add('community','choice', array('required'=>FALSE,'mapped'  => false,'choices' => $this->buildCommunityChoices(),'empty_value'=>'Select Community','attr'=>array('class'=>'form-control')))
				->add('city','text',array('required'=>FALSE,'mapped'=>FALSE,'label'=>'Current Stay', 'attr'=>array('class'=>'form-control')))
				->add('nodeid','hidden', array('mapped'=>false))
				->add('relationid', 'hidden', array('mapped'=>false))
                                ->add('submit', 'submit' , array('attr'=>array('class'=>'btn btn-success btn-block')))
                                ->getForm();

		if($nodeid == 0)
			$nodeid = $session->get('uid');
		
		$sessionid = $session->get('uid');
		$query = $em->createQueryBuilder()
			->select('t.relationid, t.invited, a.gender, t.id, t.relnodeid, a.firstname, a.lastname, a.city, u.login_status')
			->from('TreeTreeBundle:Tree', 't')
			->innerJoin('TreeTreeBundle:Account', 'a', 'with', 'a.userid = t.relnodeid')
			->innerJoin('TreeTreeBundle:User', 'u', 'with' , 'u.id = t.relnodeid')
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

			if($toptree[$i]['relationid'] == 1){
				$tree[1][0]['relationid'] = $toptree[$i]['relationid'];
				$tree[1][0]['params'][$i]['id'] = $toptree[$i]['relnodeid'];
				$tree[1][0]['params'][$i]['firstname'] = $toptree[$i]['firstname'];
				$tree[1][0]['params'][$i]['lastname'] = $toptree[$i]['lastname'];
				$tree[1][0]['params'][$i]['city'] = $toptree[$i]['city'];
				$tree[1][0]['params'][$i]['login_status'] = $toptree[$i]['login_status'];
				$tree[1][0]['params'][$i]['invited'] = $toptree[$i]['invited'];
				$tree[1][0]['params'][$i]['gender'] = $toptree[$i]['gender'];
			}
			elseif($toptree[$i]['relationid'] == 2){
				$tree[1][1]['relationid'] = $toptree[$i]['relationid'];
				$tree[1][1]['params'][$i]['id'] = $toptree[$i]['relnodeid'];
				$tree[1][1]['params'][$i]['firstname'] = $toptree[$i]['firstname'];
				$tree[1][1]['params'][$i]['lastname'] = $toptree[$i]['lastname'];
				$tree[1][1]['params'][$i]['city'] = $toptree[$i]['city'];
				$tree[1][1]['params'][$i]['login_status'] = $toptree[$i]['login_status'];
				$tree[1][1]['params'][$i]['invited'] = $toptree[$i]['invited'];
				$tree[1][1]['params'][$i]['gender'] = $toptree[$i]['gender'];							
			}
		}
	
		$query = $em->createQueryBuilder()
                        ->select('t.relationid, t.id, t.relnodeid, a.gender, t.invited, a.firstname, a.lastname, a.city, u.login_status')
                        ->from('TreeTreeBundle:Tree', 't')
			->innerJoin('TreeTreeBundle:Account', 'a', 'with', 'a.userid = t.relnodeid')
			->innerJoin('TreeTreeBundle:User', 'u', 'with', 'u.id = t.relnodeid')
			->where('t.nodeid = :nodeid')
		        ->andWhere('t.position = 2')
                        ->setParameter('nodeid', $nodeid);
		
                $parelleltree = $query->getQuery()->getArrayResult();
		
		
		$query = $em->createQueryBuilder()
                        ->select('count(t.id)')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 2')
                        ->setParameter('nodeid', $nodeid);

      		$parelleltreecount = count($parelleltree);

		$j = 0;

		for($i = 0; $i < $parelleltreecount; $i++){
			
			if($parelleltree[$i]['relationid'] == 0){
				 $tree[2][0]['relationid'] = $parelleltree[$i]['relationid'];
        	                 $tree[2][0]['id'] = $parelleltree[$i]['relnodeid'];
	 			$tree[2][0]['firstname'] = $parelleltree[$i]['firstname'];
				$tree[2][0]['lastname'] = $parelleltree[$i]['lastname'];
				$tree[2][0]['city'] = $parelleltree[$i]['city'];
				$tree[2][0]['login_status'] = $parelleltree[$i]['login_status'];
				$tree[2][0]['invited'] = $parelleltree[$i]['invited'];
				$tree[2][0]['gender'] = $parelleltree[$i]['gender'];
				$j++;
			}
		}
		
		
		for($i = 0; $i < $parelleltreecount; $i++){
			if($parelleltree[$i]['relationid'] == 3 || $parelleltree[$i]['relationid'] == 8){
	              		$tree[2][1]['relationid'] = $parelleltree[$i]['relationid'];
	              	$tree[2][1]['params'][$i]['id'] = $parelleltree[$i]['relnodeid'];
        			$tree[2][1]['params'][$i]['relationid'] = $parelleltree[$i]['relationid'];
				$tree[2][1]['params'][$i]['firstname'] = $parelleltree[$i]['firstname'];
				$tree[2][1]['params'][$i]['lastname'] = $parelleltree[$i]['lastname'];
				$tree[2][1]['params'][$i]['city'] = $parelleltree[$i]['city'];
				$tree[2][1]['params'][$i]['login_status'] = $parelleltree[$i]['login_status'];
				$tree[2][1]['params'][$i]['invited'] = $parelleltree[$i]['invited'];
				$tree[2][1]['gender'] = $parelleltree[$i]['gender'];
			}
                }
		
				
             /* for($i = 0; $i < $parelleltreecount; $i++){
			if($parelleltree[$i]['relationid']!=0 && $parelleltree[$i]['relationid']!=8 && $parelleltree[$i]['relationid']!=3 ){
                        $tree[4][$i]['relationid'] = $parelleltree[$i]['relationid'];
			 $tree[4][$i]['id'] = $parelleltree[$i]['relationid'];
			}
                } */

		 $query = $em->createQueryBuilder()
                        ->select('t.relationid, t.id, t.relnodeid, a.gender, t.invited, a.firstname, a.lastname, a.city, u.login_status')
                        ->from('TreeTreeBundle:Tree', 't')
			->innerJoin('TreeTreeBundle:Account','a', 'with' , 'a.userid = t.relnodeid')
			->innerJoin('TreeTreeBundle:User', 'u', 'u.id = t.relnodeid')
			->where('t.nodeid = :nodeid')
		        ->andWhere('t.position = 3')
			->add('groupBy', 't.relnodeid')
                        ->setParameter('nodeid', $nodeid);

                $bottomtree = $query->getQuery()->getArrayResult();

		//print_r($bottomtree);

		$count = count($bottomtree);
                $query = $em->createQueryBuilder()
		        ->select('count(t.id)')
                        ->from('TreeTreeBundle:Tree', 't')
                        ->where('t.nodeid = :nodeid')
                        ->andWhere('t.position = 3')
                        ->setParameter('nodeid', $nodeid);

                $bottomtreecount = $query->getQuery()->getSingleScalarResult();

                for($i = 0; $i < $bottomtreecount; $i++){
		if($bottomtree[$i]['relationid'] == 6 || $bottomtree[$i]['relationid'] == 7){

				$tree[3][0]['relationid'] = $bottomtree[$i]['relationid'];
                        	$tree[3][0]['params'][$i]['relationid'] = $bottomtree[$i]['relationid'];
				$tree[3][0]['params'][$i]['id'] = $bottomtree[$i]['relnodeid'];
				$tree[3][0]['params'][$i]['firstname'] = $bottomtree[$i]['firstname'];
				$tree[3][0]['params'][$i]['lastname'] = $bottomtree[$i]['lastname'];
				$tree[3][0]['params'][$i]['city'] = $bottomtree[$i]['city'];
				$tree[3][0]['params'][$i]['login_status'] = $bottomtree[$i]['login_status'];
				$tree[3][0]['params'][$i]['invited'] = $bottomtree[$i]['invited'];
				$tree[3][0]['params'][$i]['gender'] = $bottomtree[$i]['gender'];
			}
                } 
	
	//	print_r($tree);		
		for($i = 0; $i < $parelleltreecount; $i++){
                        if($parelleltree[$i]['relationid']!=0 && $parelleltree[$i]['relationid']!=8 && $parelleltree[$i]['relationid']!=3 ){
                        	$tree[4][$i]['relationid'] = $parelleltree[$i]['relationid'];
                         	$tree[4][$i]['id'] = $parelleltree[$i]['relnodeid'];
				$tree[4][$i]['firstname'] = $parelleltree[$i]['firstname'];
				$tree[4][$i]['lastname'] = $parelleltree[$i]['lastname'];
				$tree[4][$i]['city'] = $parelleltree[$i]['city'];
				$tree[4][$i]['login_status'] = $parelleltree[$i]['login_status'];
				$tree[4][$i]['invited'] = $parelleltree[$i]['invited'];
				$tree[4][$i]['gender'] = $parelleltree[$i]['gender'];
                        }
                } 
		//print_r($tree);	
		$form->handleRequest($request);
		//echo $session->get('gender');	
		if($request->isMethod('POST')){
			if($form->isValid()){		
				$nodeid = $form['nodeid']->getData();
			$relationid = $form['relationid']->getData();
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
	                                        case 1: $position = 1;  $reverse = 3; if($session->get('gender') == 1) { $reverserelation = 6; } else { $reverserelation = 7; }  break;
                                                case 2: $position = 1;  $reverse = 3; if($session->get('gender') == 1) { $reverserelation = 6; } else { $reverserelation = 7; } break;
        	                                case 3: $position = 2;  $reverse = 2; $reverserelation = 8; break;
	                                        case 4: $position = 2;  $reverse = 2; if($session->get('gender') == 1) { $reverserelation = 4; } else { $reverserelation = 5; } break;
                                                case 5: $position = 2;  $reverse = 2; if($session->get('gender') == 1) { $reverserelation = 4; } else { $reverserelation = 5; }break;
                                                case 6: $position = 3;  $reverse = 1; if($session->get('gender') == 1) { $reverserelation = 1; } else { $reverserelation = 2; } break;
                                                case 7: $position = 3;  $reverse = 1; if($session->get('gender') == 1) { $reverserelation = 1; } else { $reverserelation = 2; }break;
                                                case 8: $position = 2;  $reverse = 2; $reverserelation = 3; break;
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
                                        $account->setUserprofileid(8);

                                        $em->persist($account);
                                        $em->flush();

                                        $tree = new Tree();

                                        $tree->setNodeid($nodeid);
                                        $tree->setRelnodeid($userid);
                                        $tree->setPosition($position);
                                        $tree->setRelationid($relationid);

                                        $em->persist($tree);
                                        $em->flush();


					$tree = new Tree();
					
					$tree->setNodeid($userid);
					$tree->setRelnodeid($nodeid);
					$tree->setPosition($reverse);
					$tree->setRelationid($reverserelation);

					$em->persist($tree);
					$em->flush();

					$tree = new Tree();

                                        $tree->setNodeid($userid);
                                        $tree->setRelnodeid($userid);
                                        $tree->setPosition(2);
                                        $tree->setRelationid(0);

                                        $em->persist($tree);
                                        $em->flush();

						
					if($relationid == 1){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>2));
						foreach($treeArray as $t){
							$tid = $t->getId();

							if(isset($tid)){
								$relnodeid = $t->getRelnodeid();
								
								$treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
								foreach($treenewArray as $tn){
									$tnid = $tn->getId();
								}
								
								if(!isset($tnid)){
									$tree =  new Tree();
									
									$tree->setNodeid($userid);
									$tree->setRelnodeid($relnodeid);
									$tree->setPosition(2);
									$tree->setRelationid(3);

									$em->persist($tree);
									$em->flush();

									$tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(8);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}
							}
						}
						
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>4));
						foreach($treeArray as $t){
							$tid = $t->getId();

							if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

								 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }
									
								if(!isset($tnid)){
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();


									$tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();


								}
							}
						}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>5));
						foreach($treeArray as $t){
                                                        $tid = $t->getId();

				                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }
								
								if(!isset($tnid)){
									 $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();
								
								}
							}
						}

					}
					if($relationid == 2){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>1));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }
								
								if(!isset($tnid)){
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(8);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(3);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}
							}
						}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>4));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                }
                                                        }
			                       	}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>5));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                         $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }


					}
					if($relationid == 3){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>6));
						foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){	
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}

							}
						}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>7));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}
							}
						}

						
					}
					if($relationid == 4){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>1));
						foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}
							}
						}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>2));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
								$relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
									$tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();

								}
							}
						}
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>4));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>5));
                                                foreach($treeArray as $t){
                                                      $tid = $t->getId();
						
                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
								var_dump($treenewArray);
                                                                foreach($treenewArray as $tn){
                                                        	   $tnm = $tn->getId();
                                                                }
					
					
                                                                if(!isset($tnm)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();
								
                                                                }
                                                        }
                                                }	
					//	exit;

					}
					if($relationid == 5){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>1));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
						}
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>2));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>4));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>5));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
					}		
					if($relationid == 6){
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>3));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>8));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }

						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>6));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>7));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tns = $tn->getId();
                                                                }

                                                                if(!isset($tns)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }

					}
					if($relationid == 7){
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>8));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>3));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(2);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>6));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(4);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>7));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(2);
                                                                        $tree->setRelationid(5);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }



					}
					if($relationid == 8){
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>6));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(6);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }
						 $treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$nodeid, 'relationid'=>7));
                                                foreach($treeArray as $t){
                                                        $tid = $t->getId();

                                                        if(isset($tid)){
                                                                $relnodeid = $t->getRelnodeid();

                                                                 $treenewArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$userid, 'relnodeid'=>$relnodeid));
                                                                foreach($treenewArray as $tn){
                                                                        $tnid = $tn->getId();
                                                                }

                                                                if(!isset($tnid)){
                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($userid);
                                                                        $tree->setRelnodeid($relnodeid);
                                                                        $tree->setPosition(3);
                                                                        $tree->setRelationid(7);

                                                                        $em->persist($tree);
                                                                        $em->flush();


                                                                        $tree =  new Tree();

                                                                        $tree->setNodeid($relnodeid);
                                                                        $tree->setRelnodeid($userid);
                                                                        $tree->setPosition(1);
                                                                        $tree->setRelationid(1);

                                                                        $em->persist($tree);
                                                                        $em->flush();

                                                                }
                                                        }
                                                }

					}
                                        $session->getFlashBag()->add('success', 'A node was successfully attached to your tree');
					return $this->redirect($this->generateUrl('tree_tree_mytree'));
				}
			}
			else {
				return $this->render('TreeTreeBundle:User:addconnection.html.twig', array('form'=>$form->createView()));
			}
		}
		/* [1][0]['relationid']=1;
		1][0]['firstname']= 'Tom';
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
	
		$query = $em->createQueryBuilder()
			->select('n.notificationtype, n.created, n.entityname, n.event, n.post, n.relationname, n.addedby, n.entityid, n.readstatus')
			->from('TreeTreeBundle:Notifications', 'n')
			->where('n.userid = :userid')
			->add('orderBy' , 'n.id desc')
			->setParameter('userid', $sessionid);

		$notif = $query->getQuery()->getArrayResult();

		 $query = $em->createQueryBuilder()
			->select('count(n.id)')
			->from('TreeTreeBundle:Notifications', 'n')
			->where('n.userid = :userid')
			->andWhere('n.readstatus = 0')
			->setparameter('userid', $sessionid);
		
		$notifcount = $query->getQuery()->getSingleScalarResult();
		
		 $query = $em->createQueryBuilder()
			->select('count(c.id)')
			->from('TreeTreeBundle:Chat','c')
			->where('c.msgto = :userid')
			->andWhere('c.recd = 0')
			->setParameter('userid', $sessionid);
		
		$messageCount = $query->getQuery()->getSingleScalarResult();

 		$query = $em->createQueryBuilder()
			->select('c.msgfrom, u.login_status, c.message, a.firstname, a.lastname, c.sent, c.recd')
			->from('TreeTreeBundle:Chat','c')
			->innerJoin('TreeTreeBundle:Account', 'a', 'with' , 'a.userid = c.msgfrom')
			->innerJoin('TreeTreeBundle:User', 'u', 'with', 'u.id = c.msgfrom')
			->where('c.msgto = :userid')
			->andWhere('c.recd = 1')
			->add('groupBy', 'c.msgfrom')
			->add('orderBy', 'c.id desc')
			->setParameter('userid', $sessionid);

		$messages = $query->getQuery()->getArrayResult();

		$eventdata = $this->getEvents($sessionid);

	//	print_r($messages);
	var_dump($tree);	
		//$messageCount = count($messages);	
		return $this->render('TreeTreeBundle:User:mytree.html.twig', array('tree'=>$tree, 'addnodeform'=>$form->createView(), 'notifs'=>$notif, 'ncount'=>$notifcount, 'mcount'=>$messageCount, 'messages'=>$messages, 'eventdata'=>$eventdata));
	}
	
	protected function getEvents($sessionid)
	{
				$em = $this->getDoctrine()->getManager();
				$query = $em->createQueryBuilder()
						->select('e.id,e.eventname,a.firstname,a.lastname,er.inviteeid,e.eventdate')
						->from('TreeTreeBundle:Eventtoinviteesrel','er')
						->innerJoin('TreeTreeBundle:Event','e', 'with', 'e.id = er.eventid')
						->innerJoin('TreeTreeBundle:Account','a','with', 'a.userid = e.author')
						->where('er.inviteeid = :id ')
						->setParameter('id', $sessionid)
						->addOrderBy('er.inviteeid', 'DESC')
						->setMaxResults('5');
				$data = $query->getQuery()->getResult();
				return $data;
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

	public function blocklistAction()
	{
		return $this->render('TreeTreeBundle:User:blocklist.html.twig');
	}
	
	/*
	public function searchAction($value)
	{

		$request = Request::createFromGlobals();		

		$category =  $request->query->get('value');
		
	}
	*/
	
}


?>
