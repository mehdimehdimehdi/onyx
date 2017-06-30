<?php

namespace onyx\HomeBundle\Controller\Chantier;

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
use onyx\HomeBundle\Entity\Chantier;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;



class ChantierController extends Controller
{
	/**
	 * @View()
	 * @Get("/chantiers")
	 * @ApiDoc(
     * description="Afficher tous les chantiers"
     * )
	 */
	public function getAllChantiers(Request $request)
	{
		$chantiers = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Chantier')
		->findAll();
		
		return $chantiers;
	}
	
	/**
	 * @View()
	 * @Get("/chantiers/{id}")
	 * @ApiDoc(
     * description="Afficher le chantier {id}"
     * )
	 */
	public function getPieceAction(Request $request)
	{
		$chantier = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Chantier')
		->find($request->get('id'));
		
		if (empty($chantier)) {
			return new JsonResponse(['message' => 'Chantier not found'], Response::HTTP_NOT_FOUND);
		}
		
		return $chantier;
	}
	
	/**
	 * @View()
	 * @Get("/projects/{id}/chantiers")
	 */
	
	public function getProjectChantierAction(Request $request)
	{
		$projet = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Projet')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		/* @var $projet Projet */
		
		if (empty($projet)) {
			return $this->projetNotFound();
		}
		
		return $projet->getChantiers();
	}
	
	private function projetNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Projet not found'], Response::HTTP_NOT_FOUND);
		
	}
	
	/**
	 * @View()
	 * @Get("/mecanos/{id}/chantiers")
	 */
	
	public function getMecanoChantierAction(Request $request)
	{
		$mecano = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Mecano')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		/* @var $mecano Mecano */
		
		if (empty($mecano)) {
			return $this->mecanoNotFound();
		}
		
		return $mecano->getChantiers();
	}
	
	private function mecanoNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Mecano not found'], Response::HTTP_NOT_FOUND);
		
	}
	
	
}