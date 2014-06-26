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


class MessageController extends Controller
{
	public function indexAction()
	{
		return $this->render('TreeTreeBundle:Message:index.html.twig');
	} 
}
?>
