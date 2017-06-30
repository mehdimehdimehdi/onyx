<?php

namespace onyx\HomeBundle\Controller\Piece;

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
use onyx\HomeBundle\Entity\Piece;
use onyx\HomeBundle\Entity\Projet;



class PieceController extends Controller
{
	/**
	 * @View()
	 * @Get("/pieces")
	 */
	public function getAllPieces(Request $request)
	{
		$pieces = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Piece')
		->findAll();
		
		return $pieces;
	}
	
	/**
	 * @View()
	 * @Get("/pieces/{id}")
	 */
	public function getPieceAction(Request $request)
	{
		$piece = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Piece')
		->find($request->get('id'));
		
		if (empty($piece)) {
			return new JsonResponse(['message' => 'Piece not found'], Response::HTTP_NOT_FOUND);
		}
		
		return $piece;
	}
	
	/**
	 * @View()
	 * @Get("/projets/{id}/pieces")
	 */
	
	public function getProjectPieceAction(Request $request)
	{
		$projet = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Projet')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		/* @var $mecano Mecano */
		
		if (empty($projet)) {
			return $this->projetNotFound();
		}
		
		return $projet->getPieces();
	}
	
	private function projetNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Projet not found'], Response::HTTP_NOT_FOUND);
		
	}
}