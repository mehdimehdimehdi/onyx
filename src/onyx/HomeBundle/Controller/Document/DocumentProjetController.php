<?php

namespace onyx\HomeBundle\Controller\Document;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use onyx\HomeBundle\Entity\Utilisateur;
use onyx\HomeBundle\Entity\DocumentProjet;
use onyx\HomeBundle\Form\Type\ProjectType;
use Symfony\Component\HttpFoundation\JsonResponse;



class DocumentProjetController extends Controller
{
	/**
	 * @View(serializerGroups="allDocuments")
	 * @Get("/documents")
	 */
	public function getAllDocuments(Request $request)
	{
		$documents = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:DocumentProjet')
		->findAll();
		
		return $documents;
	}
	
	private function projetNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Projet not found'], Response::HTTP_NOT_FOUND);
		
	}
	
	
	/**
	 * @View(serializerGroups="ProjectIDDocuments")
	 * @Get("/projects/{id}/documents")
	 */
	public function getDocumentProject(Request $request)
	{
		$projet = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Projet')
		->find($request->get('id'));
		
		if (empty($projet)) {
			return $this->projetNotFound();
		}
		
		return $projet->getDocuments();
	}
	
		
}