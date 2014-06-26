<?php 
namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Tree\TreeBundle\Entity\User;
use Tree\TreeBundle\Entity\Account;
use Tree\TreeBundle\Entity\Usertoaccessrel;
use Tree\TreeBundle\Entity\Usertoiprel; 
use Tree\TreeBundle\Entity\Relation;
use Tree\TreeBundle\Entity\Loginattempthistory;
use Tree\TreeBundle\Entity\Userblockfromchatrel;
use Tree\TreeBundle\Entity\Tree;
use Tree\TreeBundle\Entity\Event;
use Tree\TreeBundle\Entity\Eventtoaddressrel;
use Tree\TreeBundle\Entity\Eventtoinviteesrel;
use Tree\TreeBundle\Entity\Notifications;

class EventController extends Controller
{
	public function indexAction(Request $request)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();
		
		if($session->has('uid')){
			$sessionid = $session->get('uid');

			/* $query = $em->createQueryBuilder()
				->select(' e.eventname, e.eventdescription, e.eventhash, e.event, e.eventdate, e.author, i.eventid')	
				->from('TreeTreeBundle:Eventtoinviteesrel', 'i')
				->innerJoin('TreeTreeBundle:Event', 'e',  'with', 'e.id = i.eventid')	
				->where('i.inviteeid = :sessionid')
				->setParameter('sessionid', $sessionid);
			*/
			$events = $this->getEvents($sessionid); 
			//var_dump($events);
			$myevents = $this->getMyEvents($sessionid);

			$query = $em->createQueryBuilder()
	                        ->select('n.notificationtype, n.created, n.entityname, n.event, n.post, n.relationname, n.addedby, n.entityid, n.readstatus')
        	                ->from('TreeTreeBundle:Notifications', 'n')
                	        ->where('n.userid = :userid')
                        	->add('orderBy' , 'n.id desc')
				->setFirstResult(0)
				->setMaxResults(5)
                       		->setParameter('userid', $sessionid);

                	$notif = $query->getQuery()->getArrayResult();

			$event = new Event();

			$form = $this->createFormBuilder($event)
				->add('event', 'choice', array('choices'=>array('1'=>'Birthday', '2'=>'Wedding', '3'=>'Family Meet', '4'=>'Community Meet', '5'=>'Business Meet'), 'multiple'=>FALSE, 'expanded'=>FALSE, 'empty_data'=>'Choose your event Type', 'empty_value'=>NULL,'attr'=>array('class'=>'form-control')))
				->add('eventname', 'text' , array('attr'=>array('class'=>'form-control')))
				->add('eventdate', 'date', array('widget'=>'single_text', 'format'=>'yyyy-MM-dd','attr'=>array('class'=>'form-control')))
				->add('eventdescription', 'textarea', array('attr'=>array('class'=>'form-control')))
				->add('housenumber', 'text', array('mapped'=>false, 'required'=>false, 'attr'=>array('class'=>'form-control','placeholder'=>'House Number') ))
				->add('streetnumber', 'text', array('mapped'=>FALSE, 'required'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'Street Number')))
				->add('pincode', 'text', array('mapped'=>FALSE, 'required'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'Pin Code')))
				->add('location', 'text', array('mapped'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'Location')))
				->add('city', 'text', array('mapped'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'City')))
				->add('state','text', array('mapped'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'State')))
				->add('country', 'text', array('mapped'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'Country')))
				->add('address', 'textarea', array('mapped'=>FALSE, 'attr'=>array('class'=>'form-control','placeholder'=>'Address')))
				->add('reach', 'choice', array('choices'=>array('1'=>'Public', '2'=>'Family Circle', '3'=> 'Private'), 'mapped'=>FALSE, 'multiple'=>FALSE, 'expanded'=>TRUE))	
				->add('submit', 'submit', array('attr'=>array('class'=>'btn btn-primary')))
				->getForm();
			$form->handleRequest($request);
			if($request->isMethod('POST')){
				if($form->isValid()){
					$event = $form['event']->getData();
					$eventname = $form['eventname']->getData();
					$eventdate = $form['eventdate']->getData();					
					$eventdescription = $form['eventdescription']->getData();
					$housenumber = $form['housenumber']->getData();
					$streetnumber = $form['streetnumber']->getData();
					$pincode = $form['pincode']->getData();
					$location = $form['location']->getData();
					$city = $form['city']->getData();
					$state = $form['state']->getData();
					$country = $form['country']->getData();
					$address = $form['address']->getData();
					$reach = $form['reach']->getData();
					
					$eventhash = $this->generateHash(16);		
					$nowdate = new \Datetime();
					$sessionid = $session->get('uid');				
	
					$e = new Event();

					$e->setEventhash($eventhash);			
					$e->setEvent($event);
					$e->setEventdate($eventdate);
					$e->setEventname($eventname);
					$e->setEventdescription($eventdescription);
					$e->setEventrule($reach);
					$e->setCreated($nowdate);
					$e->setUpdated($nowdate);
					$e->setAuthor($sessionid);
					$e->setEventstatus(1);

					$em->persist($e);
					$em->flush();

					$eventid = $e->getId();

					$etoa = new Eventtoaddressrel();
					
					$etoa->setEventid($eventid);
					$etoa->setHousenumber($housenumber);
					$etoa->setStreetnumber($streetnumber);
					$etoa->setPincode($pincode);
					$etoa->setLocation($location);
					$etoa->setCity($city);
					$etoa->setState($state);
					$etoa->setCountry($country);
					$etoa->setGeomap(0);

					$em->persist($etoa);
					$em->flush();

					$etoaid = $etoa->getId();

					if($reach == 1 || $reach == 3 || $reach == 4){
						$etoi = new Eventtoinviteesrel();
						$notification = new Notifications();
						$inviteesArray = array();
	
						$treeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$sessionid));

						foreach($treeArray as $t){
							$relnodeid = $t->getRelnodeid();
							$relationid = $t->getRelationid();
							
							if($relationid != 0 && !in_array($relnodeid, $inviteesArray) ){
								array_push($inviteesArray, $relnodeid);

								$nextTree = $this->getDoctrine()->getRepository('TreeTreeBundle:Tree')->findBy(array('nodeid'=>$relnodeid));
								foreach($nextTree as $nt){
									$nextrelnodeid = $nt->getRelnodeid();
									$nextrelationid = $nt->getRelationid();
									if($nextrelationid != 0 && !in_array($nextrelnodeid, $inviteesArray))
										array_push($inviteesArray, $nextrelnodeid);
								}
							}
						}
						$inviteesCount = count($inviteesArray);
						
						for($i=0; $i<$inviteesCount; $i++){
							$etoi->setEventid($eventid);
							$etoi->setInviteeid($inviteesArray[$i]);
							$etoi->setInviteestatus(0);

							$em->persist($etoi);
							$em->flush();

							$notification->setUserid($inviteesArray[$i]);
							$notification->setNotificationtype(1);
							$notification->setEntityname($session->get('name'));
							$notification->setEvent($eventname);
							$notification->setReadstatus(0);
							$notification->setEntityid($eventid);
							$notification->setCreated($nowdate);

							$em->persist($notification);
							$em->flush();
						}

						
					}
					if(!isset($inviteesCount))
						$inviteesCount = 0;
					$session->getFlashBag()->add('success','Event has been successfully created. '.$inviteesCount.' have been notified about this event.');
					return $this->redirect($this->generateUrl('tree_tree_events'));
				}
				else {
					return $this->render('TreeTreeBundle:Event:index.html.twig', array('mcount'=>0, 'ncount'=>0, 'events' => $events, 'notifs'=>$notif, 'form'=>$form->createView(), 'myevents'=>$myevents));
				}
			}
			return $this->render('TreeTreeBundle:Event:index.html.twig', array('mcount'=>0, 'ncount'=>0, 'events' => $events, 'notifs'=>$notif, 'form'=>$form->createView(), 'myevents'=>$myevents));
		} else {
			return $this->redirect($this->generateUrl('tree_tree_homepage'));
		}
	}
	
	public function addeventAction()
	{
		return $this->render('TreeTreeBundle:Event:addevent.html.twig', array('mcount'=>0, 'ncount'=>0));
	}
	
	public function joineventAction($id, $author, $event)
	{
		$session = $this->container->get('session');
		$em = $this->getDoctrine()->getManager();

		if($session->has('uid')){
			$sessionid = $session->get('session');

			$inviteeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Eventtoinviteesrel')->findBy(array('eventid'=>$id, 'inviteeid'=>$sessionid));
			foreach($inviteeArrat as $i){
				$inviterelid = $i->getId();
			}

			$inviterel = $em->getRepository('TreeTreeBundle:Eventtoinviteesrel')->find($inviterelid);

			$inviterel->setStatus(1);
			
			$em->flush();

			$session->getFlashBag()->add('success','You have successfully accepted the invitation');

			$nowdate = new \Datetime();

			$notification = new Notification();

			$notification->setUserid($author);
			$notification->setNotificationtype(5);
			$notification->setEntityname($session->get('name'));
			$notification->setEvent($event);
			$notification->setReadstatus(0);
			$notification->setEntityid($id);
			$notification->setCreated($nowdate);

			$em->persist($notification);
			$em->flush();
			
			return $this->redirect($this->generateUrl('tree_tree_events'));
		}
		else {
			return $this->redirect($this->generateUrl('tree_tree_homepage'));
		}
	}

	public function maybeeventAction($id, $author, $event)
        {       
                $session = $this->container->get('session');
                $em = $this->getDoctrine()->getManager();

                if($session->has('uid')){
                        $sessionid = $session->get('session');

                        $inviteeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Eventtoinviteesrel')->findBy(array('eventid'=>$id, 'inviteeid'=>$sessionid));
                        foreach($inviteeArrat as $i){
                                $inviterelid = $i->getId();
                        }

                        $inviterel = $em->getRepository('TreeTreeBundle:Eventtoinviteesrel')->find($inviterelid);

                        $inviterel->setStatus(2);

                        $em->flush();

                        $session->getFlashBag()->add('success','You have successfully accepted the invitation');

                        return $this->redirect($this->generateUrl('tree_tree_events'));
                }
                else {
                        return $this->redirect($this->generateUrl('tree_tree_homepage'));
                }
        }
	public function declineeventAction($id, $author, $event)
        {       
                $session = $this->container->get('session');
                $em = $this->getDoctrine()->getManager();

                if($session->has('uid')){
                        $sessionid = $session->get('session');

                        $inviteeArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Eventtoinviteesrel')->findBy(array('eventid'=>$id, 'inviteeid'=>$sessionid));
                        foreach($inviteeArrat as $i){
                                $inviterelid = $i->getId();
                        }

                        $inviterel = $em->getRepository('TreeTreeBundle:Eventtoinviteesrel')->find($inviterelid);

                        $inviterel->setStatus(3);

                        $em->flush();

                        $session->getFlashBag()->add('success','You have successfully accepted the invitation');

                        return $this->redirect($this->generateUrl('tree_tree_events'));
                }
                else {
                        return $this->redirect($this->generateUrl('tree_tree_homepage'));
                }
        }
	public function generateHash($length)
        {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for($i=0; $i< $length; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
			
		$eventArray = $this->getDoctrine()->getRepository('TreeTreeBundle:Event')->findBy(array('eventhash'=>$randomString));

		foreach($eventArray as $e){
			$eventid = $e->getId();
		}

		if(isset($eventid))
			$this->generateHash(16);
		else
	                return $randomString;
        }
	
	protected function getEvents($sessionid)
        {
		$em = $this->getDoctrine()->getManager();
                $query = $em->createQueryBuilder()
                    ->select('e.eventname,er.inviteeid,e.eventdate, e.author, e.id, e.event, e.eventdate, a.firstname, a.lastname')
                     ->from('TreeTreeBundle:Eventtoinviteesrel','er')
                    ->innerJoin('TreeTreeBundle:Event','e', 'with', 'e.id = er.eventid')
		->innerJoin('TreeTreeBundle:Account', 'a', 'with', 'a.userid = e.author')
                   ->where('er.inviteeid = :id')
                   ->setParameter('id', $sessionid)
                   ->addOrderBy('er.inviteeid', 'DESC');

                 $data = $query->getQuery()->getResult();
                 return $data;
        }
	
	protected function getMyEvents($sessionid)
        {
                $em = $this->getDoctrine()->getManager();
                $query = $em->createQueryBuilder()
                    ->select('e.eventname,e.eventdate, e.author, e.id, e.event, e.eventdate, a.firstname, a.lastname')
                    ->from('TreeTreeBundle:Event','e')
                     ->innerJoin('TreeTreeBundle:Account', 'a', 'with', 'a.userid = e.author')
                     ->where('e.author = :id')
                   ->setParameter('id', $sessionid)
                   ->addOrderBy('e.id');

                 $data = $query->getQuery()->getResult();
                 return $data;
        }
	
}
?>
