<?php

namespace Tree\TreeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TestController extends Controller
{
	public function node1Action()
	{
		return $this->render('TreeTreeBundle:Home:kubulunode.html.twig');
	}
}
?>
