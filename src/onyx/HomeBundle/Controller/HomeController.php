<?php

namespace onyx\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;


class HomeController extends Controller
{
	/**
	 * @View()
	 * @Get("/")
	 */
	public function indexAction()
	{
		return $this->render('onyxHomeBundle:home:index.html.twig');
	}
}
