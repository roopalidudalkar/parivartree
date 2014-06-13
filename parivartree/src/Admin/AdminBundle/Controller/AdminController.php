<?php

namespace Admin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Admin\AdminBundle\Entity\Admin;
use Doctrine\Common\Collections;
use Symfony\Component\Validator\Constraints as Assert;

class AdminController extends Controller
{
 	public function loginAction(Request $request)
	{
		$admin = new Admin();
		

		$form = $this->createFormBuilder($admin)
			->add('email','email',array('trim'=>TRUE,'attr'=>array('class'=>'form-control','placeholder'=>'Email Id')))
			->add('password','password',array('attr'=>array('class'=>'form-control','placeholder'=>'Password')))
			->add('Submit','submit',array('attr'=>array('class'=>'btn btn-primary btn-block')))
			->getForm();

		$form->handleRequest($request);

		if($request->isMethod('POST')){
			$password = $form['password']->getData();
		
			$email = $form['email']->getData();
					
			$userArray = $this->getDoctrine()->getRepository('AdminAdminBundle:Admin')->findBy(array('email'=>$email, 'password'=>$password));
			foreach($userArray as $u){
				$id = $u->getId();
				$sessionid = $u->getSessionid();
				$sessionhash = $u->getSessionhash();
				$created = $u->getCreated();
				$last_access = $u->getLastAccess();
				$profile_id = $u->getProfileId();
				$last_access_ip = $u->getLastAccessIp();
				
			}
			

			if(isset($id)){
				$session = $this->container->get('session');

				$session->set('uid',$id);
				$session->set('email', $email);
				$session->set('sessionid',$sessionid);
				$session->set('sessionhash',$sessionhash);
				$session->set('created',$created);
				$session->set('last_access',$last_access);
				$session->set('profile_id',$profile_id);
				$session->set('last_access_id',$last_access_ip);

				return $this->redirect($this->generateUrl('admin_admin_dashboard'));	
			}
			else {
			 	$session = $this->container->get('session');
				
				$session->getFlashBag()->add('error', 'Email Id and Pass did not match');

				return $this->render('AdminAdminBundle:Admin:login.html.twig', array('form'=>$form->createView()));
			}
			
		}
		
		return $this->render('AdminAdminBundle:Admin:login.html.twig',array('form'=>$form->createView()));

	}
	
	public function dashboardAction()
	{
		return $this->render('AdminAdminBundle:Admin:dashboard.html.twig');
	}

	public function userdetailsAction()
	{
		$em = $this->getDoctrine()->getManager();

	/*	$userdetails = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findAll();
	        $query = $em->createQuery('select u.email,u.created,u.updated,u.last_access,u.status from AdminAdminBundle:parivar_user u');
	*/

		$query = $em->createQueryBuilder()
			->select('a.firstname,a.lastname,a.gender,a.martial_status,a.mobile1,a.country_present,a.state_present,a.city_present,u.email,u.created,u.updated,u.last_access,u.last_access_ip,u.status')
			->from('TreeTreeBundle:Account', 'a')
			->innerJoin('TreeTreeBundle:User', 'u')
			->where('u.id = a.userid');
			
		$res = $query->getQuery();
		$data = $res->getResult(); 
		
		return $this->render('AdminAdminBundle:Admin:userdetails.html.twig',array('userdata'=>$data));
			
	}

	public function userprofileAction($email)
	{
		
		$em = $this->getDoctrine()->getManager();
		//$id = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email));
		$query = $em->createQueryBuilder()
			->select('a.firstname,a.lastname,a.gender,a.martial_status,a.mobile1,a.country_present,a.state_present,a.city_present,u.email,u.created,u.updated,u.last_access,u.last_access_ip,u.status')
			->from('TreeTreeBundle:Account','a')
			->innerJoin('TreeTreeBundle:User','u', 'with', 'a.userid = u.id')
			->where('u.email = :email')
			->setParameter('email',$email);
		
		$res = $query->getQuery()->getResult();
		return $this->render('AdminAdminBundle:Admin:userprofile.html.twig',array('data'=>$res));
	}

	public function deleteuserAction($email)
	{
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->update('TreeTreeBundle:User','u')
			->innerJoin('TreeTreeBundle:Account','a','with','a.userid = u.id')
			->set('u.status','0')
			->where('u.email = :email')
			->setParameter('email',$email);
		$data = $query->getQuery()->getResult();
		return $this->render('AdminAdminBundle:Admin:dashboard.html.twig');
	}
/*
	public function updateuser($email)
	{
		$data = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email',$email));
		foreach($data as $a)
		{
			$id = $a->getId();
		}
	}
*/
}
?>
