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
use Admin\AdminBundle\Entity\Religiontogothrarel;
use Admin\AdminBundle\Entity\Gothra;


class AdminController extends Controller
{
 	public function loginAction(Request $request)
	{
		$admin = new Admin();
		

		$form = $this->createFormBuilder($admin)
			->add('email','email',array('trim'=>TRUE,'attr'=>array('class'=>'form-control','placeholder'=>'Email Id')))
			->add('password','password',array('attr'=>array('class'=>'form-control','placeholder'=>'Password')))
			->add('Submit','submit',array('attr'=>array('class'=>'btn btn-warning btn-block')))
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
		$session= $this->container->get('session');
	        if ($session->has('uid')) {

			return $this->render('AdminAdminBundle:Admin:dashboard.html.twig');
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	/*
	public function userdetailsAction()
	{
		$em = $this->getDoctrine()->getManager();

		$query = $em->createQueryBuilder()
			->select('a.firstname,a.lastname,a.gender,a.martial_status,a.mobile1,a.country_present,a.state_present,a.city_present,u.email,u.created,u.updated,u.last_access,u.last_access_ip,u.status')
			->from('TreeTreeBundle:Account', 'a')
			->innerJoin('TreeTreeBundle:User', 'u')
			->where('u.id = a.userid');
			
		$res = $query->getQuery();
		$data = $res->getResult(); 
		
		return $this->render('AdminAdminBundle:Admin:userdetails.html.twig',array('userdata'=>$data));
			
	}
	*/

	public function userprofileAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$em = $this->getDoctrine()->getManager();
		//$id = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email));
		$query = $em->createQueryBuilder()
			->select('a.firstname,a.lastname,a.dob,a.gender,a.city,a.locality,a.state,a.country,a.pin,a.hometown,a.mobile,a.marital_status,a.wedding_date,a.gothra,a.religion,a.community,a.profession,u.userhash,u.email,u.created,u.updated,u.last_access,u.last_access_ip,u.status')
			->from('TreeTreeBundle:Account','a')
			->innerJoin('TreeTreeBundle:User','u', 'with', 'a.userid = u.id')
			->where('u.id = :id')
			->setParameter('id',$id);
		
		$res = $query->getQuery()->getResult();
		return $this->render('AdminAdminBundle:Admin:userprofile.html.twig',array('data'=>$res,'id'=>$id));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function deleteuserAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->update('TreeTreeBundle:User','u')
			->innerJoin('TreeTreeBundle:Account','a','with','a.userid = u.id')
			->set('u.status','0')
			->where('u.id = :id')
			->setParameter('id',$id);
		$data = $query->getQuery()->getResult();
		return $this->redirect($this->generateUrl('admin_admin_userdetails'));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function updateuserAction($email,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$data = $this->getDoctrine()->getRepository('TreeTreeBundle:User')->findBy(array('email'=>$email));
		foreach($data as $a)
		{
			$id = $a->getId();
			
		}
		$account = $this->getDoctrine()->getRepository('TreeTreeBundle:Account')->findBy(array('userid'=>$id));
		foreach($account as $b)
		{
			$firstname = $b->getFirstname();
			$lastname = $b->getLastname();
			$dob = $b->getDob();
			$gender = $b->getGender();
			$city = $b->getCity();
			$locality = $b->getLocality();
			$state = $b->getState();
			$country = $b->getCountry();
			$pin = $b->getPin();
			$hometown = $b->getHometown();	
			$marital_status= $b->getMaritalStatus();
			$mobile = $b->getMobile();
			$wedding = $b->getWeddingDate();
			$gothra = $b->getGothra();
			$religion = $b->getReligion();
			$community = $b->getCommunity();
			$profession = $b->getProfession();

		}
		$form = $this->createFormBuilder()
			->add('firstname','text',array('data'=>$firstname))
			->add('lastname','text',array('data'=>$lastname))
			->add('email','text',array('data'=>$email))
			->add('dob','date',array('input'=>'string', 'widget'=>'single_text','data'=>$dob))
			->add('gender','text',array('data'=>$gender))
			->add('city','text',array('data'=>$city))
			->add('locality','text',array('data'=>$locality))
			->add('state','text',array('data'=>$state))
			->add('country','text',array('data'=>$country))
			->add('pin','text',array('data'=>$pin))
			->add('hometown','text',array('data'=>$hometown))
			->add('marital_status','text',array('data'=>$marital_status))
			->add('mobile','text',array('data'=>$mobile))
			->add('wedding_date','date',array('data'=>$wedding))
			->add('gothra','text',array('data'=>$gothra))
			->add('religion','text',array('data'=>$religion))
			->add('community','text',array('data'=>$community))
			->add('profession','text',array('data'=>$profession))
			->add('submit','submit')
			->getForm();
	
		$form->handleRequest($request);

		if($request->isMethod('POST'))
		{
			$fname = $form['firstname']->getData();
			$lname = $form['lastname']->getData();
			$email = $form['email']->getData();
			$gender = $form['gender']->getData();
			$dob = $form['dob']->getData();
			$city = $form['city']->getData();
			$locality = $form['locality']->getData();
			$state = $form['state']->getData();
			$country = $form['country']->getData();
			$pin = $form['pin']->getData();
			$hometown = $form['hometown']->getData();
			$mobile = $form['mobile']->getData();
			$marital_status = $form['marital_status']->getData();
			$wedding_date = $form['wedding_date']->getData();
			$gothra = $form['gothra']->getData();
			$religion = $form['religion']->getData();	
			$community = $form['community']->getData();
			$profession = $from['profession']->getData();
			
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder()
				->update('TreeTreeBundle:User','u')
				->innerJoin('TreeTreeBundle:Account','a','with','u.id = a.userid')
				->set('u.email',$email)
				->set('a.firstname',$fname)
				->set('a.lastname',$lname)
				->set('a.gender',$gender)
				->set('a.dob',$dob)
				->set('a.city',$city)
				->set('a.locality',$locality)
				->set('a.state',$state)
				->set('a.country',$country)
				->set('a.pin',$pin)
				->set('a.hometown',$hometown)
				->set('a.mobile',$mobile)
				->set('a.marital_status',$marital_status)
				->set('a.wedding_date',$wedding_date)
				->set('a.gothra',$gothra)
				->set('a.religion',$religion)							 ->set('a.community',$community)
				->set('a.profession',$profession)
				->where('u.email = : email')
				->setParameter('email',$email);
			$data = $query->getQuery()->getResult();
			return $this->redirect($this->generateUrl('admin_admin_userdetail'));
		}
		return $this->render('AdminAdminBundle:Admin:updateuserdata.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function updateuserdataAction()
	{
		return $this->render('AdminAdminBundle:Admin:updateuserdata.html.twig');
	}

	public function userdetailsAction($offset)
	{
		$session= $this->container->get('session');	
	if ($session->has('uid')) {
		$start = (($offset * 10) - 10);
		$em = $this->getDoctrine()->getManager();

	        $query = $em->createQueryBuilder()
                        ->select('a.firstname,a.lastname,u.email,u.created,u.updated,u.last_access,u.last_access_ip,u.id,u.status,u.userhash')
                        ->from('TreeTreeBundle:Account', 'a')
                        ->innerJoin('TreeTreeBundle:User', 'u')
                        ->where('u.id = a.userid')
			->andwhere('u.status = 1')
			->add('orderBy','u.id DESC')
			->setFirstResult($start)	
			->setMaxResults(10);
		$data = $query->getQuery()->getResult();
		$from = $start + 1;
		$to = $start +10;

		$query1 = $em->createQueryBuilder()
			->select('count(u.id)')
			->from('TreeTreeBundle:User','u')
			->innerJoin('TreeTreeBundle:Account', 'a')
                        ->where('u.id = a.userid')
                        ->andwhere('u.status = 1');
		$count = $query1->getQuery()->getSingleScalarResult();

		if($to>$count)
		$to = $count;
		$check = '1';	
		return $this->render('AdminAdminBundle:Admin:userdetails.html.twig',array('from'=>$from,'to'=>$to,'count'=>$count,'userdata'=>$data,'check'=>$check));
		}
		else
		{
			 return $this->redirect($this->generateUrl('admin_admin_login'));

		}
	}

	public function religionAction($offset,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$start = (($offset * 10) - 10);
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('r.id,r.parameter')
			->from('AdminAdminBundle:Religiontogothrarel','r')
			->where('r.religionid = 0')
			->andwhere('r.communityid = 0')
			->andwhere('r.status = 1')
			->setFirstResult($start)
			->setMaxResults(10);
		$data = $query->getQuery()->getResult();
		$from = $start + 1;
		$to = $start + 10;
		
		$query1 = $em->createQueryBuilder()
			->select('count(r.id)')
			->where('r.religionid = 0')
			->andwhere('r.communityid = 0')
                        ->andwhere('r.status = 1')
			->from('AdminAdminBundle:Religiontogothrarel','r');
		$count = $query1->getQuery()->getSingleScalarResult();
		if($to > $count)
		$to = $count;

		$form = $this->createFormBuilder()
                        ->add('parameter','text',array('label'=>'Religion Name'))
                        ->add('submit','submit',array('attr'=>array('class'=>'btn btn-primary')))
                        ->getForm();
                $form->handleRequest($request);

                if($request->isMethod('POST'))
                {
                        $name = $form['parameter']->getData();
                        $rid = 0;
                        $cid = 0;
                        $status = 1;

                        $em = $this->getDoctrine()->getManager();
                        $religion = new Religiontogothrarel();
                        $religion->setReligionid($rid);
                        $religion->setCommunityid($cid);
                        $religion->setParameter($name);
                        $religion->setStatus($status);
                        $em->persist($religion);
                        $em->flush();
		
						return $this->redirect($this->generateUrl('admin_admin_religion'));

			}
			
			$communityform = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Community Name'))
			->add('id','hidden',array('attr'=>array('id'=>'commid')))
			->add('submit','submit')
			->getForm();
		$communityform->handleRequest($request);
		
		if($request->isMethod('POST'))
		{
			$cname = $communityform['parameter']->getData();
			$rid = $id;
			$cid = 0;
			$status = 1;		
			$em = $this->getDoctrine()->getManager();
			$addcommunity1 = new Religiontogothrarel();
			$addcommunity1->setReligionid($rid);
			$addcommunity1->setCommunityid($cid);
			$addcommunity1->setParameter($cname);
			$addcommunity1->setStatus($status);
			$em->persist($addcommunity1);
			$em->flush();
		
		return $this->redirect($this->generateUrl('admin_admin_religion')); 
		}

		return $this->render('AdminAdminBundle:Admin:religion.html.twig',array('from'=>$from,'to'=>$to,'count'=>$count,'data'=>$data,'communityform'=>$communityform->createView(),'form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function addcommunityAction($id,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Community Name'))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
		
		if($request->isMethod('POST'))
		{
			$cname = $form['parameter']->getData();
			$rid = $id;
			$cid = 0;
			$status = 1;		
			$em = $this->getDoctrine()->getManager();
			$addcommunity = new Religiontogothrarel();
			$addcommunity->setReligionid($rid);
			$addcommunity->setCommunityid($cid);
			$addcommunity->setParameter($cname);
			$addcommunity->setStatus($status);
			$em->persist($addcommunity);
			$em->flush();
		
		return $this->redirect($this->generateUrl('admin_admin_religion')); 
		}
		return $this->render('AdminAdminBundle:Admin:addcommunity.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	
	}
	
	public function addreligionAction(Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Religion Name'))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
			
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			$rid = 0;
			$cid = 0;
			$status = 1;
		
			$em = $this->getDoctrine()->getManager();
			$religion = new Religiontogothrarel();
			$religion->setReligionid($rid);
			$religion->setCommunityid($cid);
			$religion->setParameter($name);
			$religion->setStatus($status);
			$em->persist($religion);
			$em->flush();
			
			return $this->redirect($this->generateUrl('admin_admin_religion'));
		}
		return $this->render('AdminAdminBundle:Admin:addreligion.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function deletereligionAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->update('AdminAdminBundle:Religiontogothrarel','r')
			->set('r.status','0')
			->where('r.id = :id')
			->setParameter('id',$id);
		$data = $query->getQuery()->getResult();
		return $this->redirect($this->generateUrl('admin_admin_religion'));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function editreligionAction(Request $request,$id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$data = $this->getDoctrine()->getRepository('AdminAdminBundle:Religiontogothrarel')->findBy(array('id'=>$id));
		foreach($data as $a)
		{
			$name = $a->getParameter();
		}
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Update Religion','data'=>$name))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			
			$rid = 0;
			$cid = 0;
			$status = 1;
			$em = $this->getDoctrine()->getManager();

			$religionrel = $em->getRepository('AdminAdminBundle:Religiontogothrarel')->find($id);

			$religionrel->setParameter($name);

			$em->flush();
			/*$query = $em->createQueryBuilder()
				->update('AdminAdminBundle:Religiontogothrarel','r')
				->set('r.religionid',$rid)
				->set('r.communityid',$cid)
				->set('r.parameter',$name)
				->where('r.id = :id')
				->setParameter('id',$id);
			$data = $query->getQuery()->getResult();*/
			return $this->redirect($this->generateUrl('admin_admin_religion'));
		}
		return $this->render('AdminAdminBundle:Admin:editreligion.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function communityAction($offset)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$start = (($offset * 10) - 10);

		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('r.id,r.parameter')
			->from('AdminAdminBundle:Religiontogothrarel','r')
			->where('r.religionid!= 0')
			->andwhere('r.communityid = 0')
			->andwhere('r.status = 1')
			->setFirstResult($start)
                        ->setMaxResults(10);

		$data = $query->getQuery()->getResult();
		$from = $start + 1;
                $to = $start + 10;

                $query1 = $em->createQueryBuilder()
                        ->select('count(r.id)')
                        ->from('AdminAdminBundle:Religiontogothrarel','r')
			->where('r.religionid!= 0')
                        ->andwhere('r.communityid = 0')
                        ->andwhere('r.status = 1');

                $count = $query1->getQuery()->getSingleScalarResult();
                if($to > $count)
                $to = $count;

		return $this->render('AdminAdminBundle:Admin:community.html.twig',array('data'=>$data,'to'=>$to,'from'=>$from,'count'=>$count));	
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}


	}
	
	public function communityaddAction(Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('r.parameter,r.id')
			->from('AdminAdminBundle:Religiontogothrarel','r')
			->where('r.religionid = 0')
			->andwhere('r.status = 1');
		$data = $query->getQuery()->getResult();
		 
	
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Community Name'))
			->add('religion', 'choice', array('mapped'  => false,'choices' => $this->buildChoices(),'empty_value'=>'Select Religion')
)
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
			
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			$rid = $form['religion']->getData();
			$cid = 0;
			$status = 1;
		
			$em = $this->getDoctrine()->getManager();
			$religion = new Religiontogothrarel();
			$religion->setReligionid($rid);
			$religion->setCommunityid($cid);
			$religion->setParameter($name);
			$religion->setStatus($status);
			$em->persist($religion);
			$em->flush();
			
			return $this->redirect($this->generateUrl('admin_admin_community'));
		}
		return $this->render('AdminAdminBundle:Admin:communityadd.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	protected function buildChoices() 
	{
	   $choices          = array();
	   $em = $this->getDoctrine()->getManager();
                 $query = $em->createQueryBuilder()
                         ->select('r.id,r.parameter')
                         ->from('AdminAdminBundle:Religiontogothrarel','r')
                         ->where('r.religionid = 0')
			 ->andwhere('r.communityid = 0')
                         ->andwhere('r.status = 1');
                 $data = $query->getQuery()->getResult();

		$query = $em->createQueryBuilder()
			->select('count(r.id)')
			->from('AdminAdminBundle:Religiontogothrarel', 'r')
			->where('r.religionid = 0')
			->andwhere('r.communityid = 0')
			->andWhere('r.status = 1');

		$count = $query->getQuery()->getSingleScalarResult();

		for($i = 0; $i < $count; $i++ ) 
		{
           		$choices[$data[$i]['id']] = $data[$i]['parameter'];
    		}
		
    	return $choices;
}

	public function deletecommunityAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->update('AdminAdminBundle:Religiontogothrarel','r')
			->set('r.status','0')
			->where('r.id = :id')
			->setParameter('id',$id);
		$data = $query->getQuery()->getResult();
		return $this->redirect($this->generateUrl('admin_admin_community'));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	public function editcommunityAction($id,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$data = $this->getDoctrine()->getRepository('AdminAdminBundle:Religiontogothrarel')->findBy(array('id'=>$id));
		foreach($data as $a)
		{
			$name = $a->getParameter();
			$rid = $a->getReligionid();
			$status = $a->getStatus();
			$cid = $a->getCommunityid();
		}
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Update Community','data'=>$name))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			
			$rid1 = $rid;
			$cid1 = $cid;
			$status1 = $status;
			$em = $this->getDoctrine()->getManager();

			$religionrel = $em->getRepository('AdminAdminBundle:Religiontogothrarel')->find($id);

			$religionrel->setParameter($name);

			$em->flush();
			/*$query = $em->createQueryBuilder()
				->update('AdminAdminBundle:Religiontogothrarel','r')
				->set('r.religionid',$rid)
				->set('r.communityid',$cid)
				->set('r.parameter',$name)
				->where('r.id = :id')
				->setParameter('id',$id);
			$data = $query->getQuery()->getResult();*/
			return $this->redirect($this->generateUrl('admin_admin_community'));
		}
	return $this->render('AdminAdminBundle:Admin:editcommunity.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function addgothraAction($id,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Gothra Name'))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
		
		if($request->isMethod('POST'))
		{
			$cname = $form['parameter']->getData();
			$rid = 0;
			$cid = $id;
			$status = 1;		
			$em = $this->getDoctrine()->getManager();
			$addcommunity = new Religiontogothrarel();
			$addcommunity->setReligionid($rid);
			$addcommunity->setCommunityid($cid);
			$addcommunity->setParameter($cname);
			$addcommunity->setStatus($status);
			$em->persist($addcommunity);
			$em->flush();
		
		return $this->redirect($this->generateUrl('admin_admin_community')); 
		}
		return $this->render('AdminAdminBundle:Admin:addgothra.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	
	}

	public function gothraAction($offset)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$start = (($offset * 10) - 10);
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('r.id,r.parameter')
			->from('AdminAdminBundle:Gothra','r')
			->where('r.status = 1')
			->setFirstResult($start)
			->setMaxResults(10);
		$data = $query->getQuery()->getResult();
		$from = $start + 1;
		$to = $start + 10;
		
		$query1 = $em->createQueryBuilder()
			->select('count(r.id)')
			->where('r.religionid = 0')
                        ->andwhere('r.communityid != 0')
                        ->andwhere('r.status = 1')
			->from('AdminAdminBundle:Religiontogothrarel','r');
		$count = $query1->getQuery()->getSingleScalarResult();
		if($to > $count)
		$to = $count;
		return $this->render('AdminAdminBundle:Admin:gothra.html.twig',array('from'=>$from,'to'=>$to,'count'=>$count,'data'=>$data));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	public function deletegothraAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->update('AdminAdminBundle:Gothra','r')
			->set('r.status','0')
			->where('r.id = :id')
			->setParameter('id',$id);
		$data = $query->getQuery()->getResult();
		return $this->redirect($this->generateUrl('admin_admin_gothra'));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	public function editgothraAction($id,Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {

		$data = $this->getDoctrine()->getRepository('AdminAdminBundle:Gothra')->findBy(array('id'=>$id));
		foreach($data as $a)
		{
			$name = $a->getParameter();
		}
		$form = $this->createFormBuilder()
			->add('parameter','text',array('data'=>$name))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			
			$status = 1;
			$em = $this->getDoctrine()->getManager();

			$religionrel = $em->getRepository('AdminAdminBundle:Gothra')->find($id);

			$religionrel->setParameter($name);

			$em->flush();
			
			return $this->redirect($this->generateUrl('admin_admin_gothra'));
		}
	return $this->render('AdminAdminBundle:Admin:editgothra.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	public function gothraaddAction(Request $request)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		
		$form = $this->createFormBuilder()
			->add('parameter','text',array('label'=>'Gothra Name'))
			->add('submit','submit')
			->getForm();
		$form->handleRequest($request);
			
		if($request->isMethod('POST'))
		{
			$name = $form['parameter']->getData();
			$status = 1;
		
			$em = $this->getDoctrine()->getManager();
			$gothra = new Gothra();
			$gothra->setParameter($name);
			$gothra->setStatus($status);
			$em->persist($gothra);
			$em->flush();
			
			return $this->redirect($this->generateUrl('admin_admin_gothra'));
		}
		return $this->render('AdminAdminBundle:Admin:gothraadd.html.twig',array('form'=>$form->createView()));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}

	protected function buildChoices1() 
	{
	   $choices = array();
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
	public function viewcommunityAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('r.parameter')
			->from('AdminAdminBundle:Religiontogothrarel','r')
			->where('r.communityid = 0')
			->andwhere('r.status = 1')
			->andwhere('r.religionid = :rid')
			->setParameter('rid',$id);
		$data= $query->getQuery()->getResult();

		
		$query1 = $em->createQueryBuilder()
			->select('count(r.id)')
			->from('AdminAdminBundle:Religiontogothrarel','r')
                        ->where('r.communityid = 0')
                        ->andwhere('r.status = 1')
			->andwhere('r.religionid = :rid')
		        ->setParameter('rid',$id);
		return $this->render('AdminAdminBundle:Admin:viewcommunity.html.twig',array('data'=>$data));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	public function inactiveusersAction($offset)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$start = (($offset * 10) - 10);
		$em = $this->getDoctrine()->getManager();

	        $query = $em->createQueryBuilder()
                        ->select('a.firstname,a.lastname,u.email,u.created,u.updated,u.last_access,u.id,u.last_access_ip,u.status')
                        ->from('TreeTreeBundle:Account', 'a')
                        ->innerJoin('TreeTreeBundle:User', 'u')
                        ->where('u.id = a.userid')
			->andwhere('u.status = 0')
			->add('orderBy','u.id DESC')
			->setFirstResult($start)	
			->setMaxResults(10);
		$data = $query->getQuery()->getResult();
		$from = $start + 1;
		$to = $start +10;

		$query1 = $em->createQueryBuilder()
			->select('count(u.id)')
			->from('TreeTreeBundle:User','u')
			->innerJoin('TreeTreeBundle:Account', 'a')
                        ->where('u.id = a.userid')
                        ->andwhere('u.status = 0');

		$count = $query1->getQuery()->getSingleScalarResult();

		if($to>$count)
		$to = $count;
		$check = '0';		
		return $this->render('AdminAdminBundle:Admin:inactiveusers.html.twig',array('from'=>$from,'to'=>$to,'count'=>$count,'userdata'=>$data,'check'=>$check));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}

	public function lastaccessedAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQueryBuilder()
			->select('p.login_ip,p.userid,p.logout_ip')
			->from('TreeTreeBundle:Usertoiprel','p')
			->where('p.userid = :id')
			->setParameter('id',$id);
		$data = $query->getQuery()->getResult();
		return $this->render('AdminAdminBundle:Admin:lastaccessed.html.twig',array('data'=>$data,'id'=>$id));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}

	}
	
	public function countryAction($offset)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
			$start = (($offset * 10) - 10);
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder()
				->select('c.id,c.countryid,c.stateid,c.cityid,c.parameter')
				->from('AdminAdminBundle:Country','c')
				->where('c.stateid = 0')
				->andwhere('c.countryid = 0')
				->andwhere('c.cityid = 0')
				->andwhere('c.status = 1')
				->setFirstResult($start)
				->setMaxResults(10);
			$data = $query->getQuery()->getResult();
			$from = $start + 1;
			$to = $start + 10;
		
			$query1 = $em->createQueryBuilder()
					->select('count(c.id)')
					->from('AdminAdminBundle:Country','c')
					->where('c.stateid = 0')
					->andwhere('c.countryid = 0')
					->andwhere('c.cityid = 0')
					->andwhere('c.status = 1');
			$count = $query1->getQuery()->getSingleScalarResult();
			if($to > $count)
			$to = $count;
			return $this->render('AdminAdminBundle:Admin:country.html.twig',array('data'=>$data, 'from'=>$from, 'to'=>$to, 'count'=>$count));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}
	
	public function stateAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder()
					->select('c.id,c.parameter')
					->from('AdminAdminBundle:Country','c')
					->where('c.stateid = 0')
					->andwhere('c.cityid = 0')
					->andwhere('c.status = 1')
					->andwhere('c.countryid = :cid')
					->setParameter('cid',$id);
			$data = $query->getQuery()->getResult();
			return $this->render('AdminAdminBundle:Admin:state.html.twig',array('data'=>$data));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}
	
	public function cityAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder()
					->select('c.id,c.parameter')
					->from('AdminAdminBundle:Country','c')
					->where('c.countryid = 0')
					->andwhere('c.cityid = 0')
					->andwhere('c.status = 1')
					->andwhere('c.stateid = :sid')
					->setParameter('sid',$id);
			$data = $query->getQuery()->getResult();
			return $this->render('AdminAdminBundle:Admin:city.html.twig',array('data'=>$data));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}
	
	public function viewcityAction($id)
	{
		$session= $this->container->get('session');
		if ($session->has('uid')) {
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQueryBuilder()
					->select('c.id,c.parameter')
					->from('AdminAdminBundle:Country','c')
					->innerJoin('AdminAdminBundle:Country','a')
					->where('c.stateid = a.id')
					->andwhere('c.status = 1')
					->andwhere('a.countryid = :id')
					->setParameter('id',$id);	
					
			$data = $query->getQuery()->getResult();
			return $this->render('AdminAdminBundle:Admin:city.html.twig',array('data'=>$data));
		}
		else
		{
			return $this->redirect($this->generateUrl('admin_admin_login'));
		}
	}
	
}
?>
