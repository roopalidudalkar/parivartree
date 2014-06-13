<?php
namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Symfony\Component\Validator\Constraints as Assert;

class AuthenticationController extends Controller 
{
	public function authenticateAction()
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
				$auth = 1;
			}
		
			$auth = 5;
		} else {
			$auth = 5;
		}
		
		return $auth;
	}

	public function getSession()
	{
		return $session = $this->container->get('session');
	}
}
?>
