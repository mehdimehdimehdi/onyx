<?php

namespace onyx\HomeBundle\Controller\Tache;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use onyx\HomeBundle\Entity\Utilisateur;
use onyx\HomeBundle\Entity\Projet;
use onyx\HomeBundle\Form\Type\ProjectType;
use Symfony\Component\HttpFoundation\JsonResponse;
use onyx\HomeBundle\Entity\Mecano;



class TacheController extends Controller
{
	/**
	 * @View()
	 * @Get("/taches")
	 */
	public function getAllMecanos(Request $request)
	{
		$taches = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Tache')
		->findAll();
		
		return $taches;
	}
	
		
	/**
	 * @View()
	 * @Get("/mecanos/{id}/taches")
	 */
	public function getMecanoAction(Request $request)
	{
		$mecano = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Mecano')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		/* @var $mecano Mecano */
		
		if (empty($mecano)) {
			return $this->mecnaoNotFound();
		}
		
		return $mecano->getTaches();
	}
	
		
	private function mecnaoNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Mecano not found'], Response::HTTP_NOT_FOUND);
		
	}
}