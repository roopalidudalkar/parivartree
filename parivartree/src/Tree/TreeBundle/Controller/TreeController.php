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
use Tree\TreeBundle\Entity\Tree;

class TreeController extends Controller
{
	public function addnodeAction($nodeid, $relationid,  Request $request)
        {
                $session = $this->container->get('session');
                $em = $this->getDoctrine()->getManager();

                $user = new User();
		
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
                                	return $this->render('TreeTreeBundle:User:node1.html.twig', array('accounts'=>$accountArray));
                                }
				else{
                			switch($relationid){
                                        	case 1: $position = 1; break;
                                                case 2: $position = 1; break;
                                                case 3: $position = 2; break;
                                                case 4: $position = 2; break;
                                                case 5: $position = 2; break;
                                                case 6: $position = 2; break;
                                                case 7: $position = 3; break;
                                                case 8: $position = 2; break;
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

}
?>
