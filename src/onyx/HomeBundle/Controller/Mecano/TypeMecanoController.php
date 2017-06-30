<?php

namespace onyx\HomeBundle\Controller\Mecano;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use onyx\HomeBundle\Entity\TypeMecano;
use onyx\HomeBundle\Entity\Mecano;
use onyx\HomeBundle\Form\Type\TypeMecanoType;
use Symfony\Component\HttpFoundation\JsonResponse;



class TypeMecanoController extends Controller
{
	
	/**
	 * @View()
	 * @Get("/typemecanos")
	 */
	public function getTypeMecanos(Request $request)
	{
		$types = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:TypeMecano')
		->findAll();
		
		return $types;
	}
	
	/**
	 * @View()
	 * @Get("/typesmecanos/{id}/mecanos")
	 */
	public function getTypesAction(Request $request)
	{
		$type= $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:TypeMecano')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		
		if (empty ($type)) {
			return $this->typeNotFound();
		}
		
		return $type->getMecnao();
	}
	
	
	private function typeNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'Etat not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Type not found'], Response::HTTP_NOT_FOUND);
		
	}
}