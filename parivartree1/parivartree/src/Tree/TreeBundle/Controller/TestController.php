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

class TestController extends Controller
{
	public function node1Action()
	{
		return $this->render('TreeTreeBundle:Home:kubulunode.html.twig');
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
				->add('search','text',array('required'=>FALSE,'mapped'=>false,'attr'=>array('class'=>'user-search','placeholder'=>'Search for people, place and community.')))
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
					return $this->redirect($this->generateUrl('tree_tree_mytree1'));
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
		$mytree = json_encode($tree);		
		//$messageCount = count($messages);	
		var_dump($mytree);
		return $this->render('TreeTreeBundle:User:mytree1.html.twig', array('tree'=>$mytree, 'addnodeform'=>$form->createView(), 'notifs'=>$notif, 'ncount'=>$notifcount, 'mcount'=>$messageCount, 'messages'=>$messages, 'eventdata'=>$eventdata));
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
}
?>
