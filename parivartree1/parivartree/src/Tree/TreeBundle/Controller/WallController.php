<?php

namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Mapping\ClassMetaData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Common\Collections;
use Symfony\Component\Validator\Constraints as Assert;

class WallController extends Controller
{
	public function indexAction()
	{
		return $this->render('TreeTreeBundle:wall:wall.html.twig');
	}
}
