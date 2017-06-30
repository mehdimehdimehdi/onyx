<?php

namespace onyx\HomeBundle\Controller\Mecano;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use onyx\HomeBundle\Entity\Utilisateur;
use onyx\HomeBundle\Entity\Mecano;
use onyx\HomeBundle\Form\Type\ProjectType;
use Symfony\Component\HttpFoundation\JsonResponse;



class MecanoController extends Controller
{
	/**
	 * @View()
	 * @Get("/mecanos")
	 */
	public function getAllMecanos(Request $request)
	{
		$mecanos = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Mecano')
		->findAll();
		
		return $mecanos;
	}
	
	/**
	 * @View()
	 * @Get("/mecanos/{id}")
	 */
	public function getMecanoAction(Request $request)
	{
		$mecano = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Mecano')
		->find($request->get('id'));
		
		if (empty($mecano)) {
			return new JsonResponse(['message' => 'Mecano not found'], Response::HTTP_NOT_FOUND);
		}
		
		return $mecano;
	}
	
	private function mecanoNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Mecano not found'], Response::HTTP_NOT_FOUND);
		
	}
}