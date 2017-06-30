<?php

namespace onyx\HomeBundle\Controller\Project;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use onyx\HomeBundle\Entity\EtatsProject;
use onyx\HomeBundle\Entity\Projet;
use onyx\HomeBundle\Form\Type\ProjectType;
use Symfony\Component\HttpFoundation\JsonResponse;



class EtatsProjectController extends Controller
{
	
	/**
	 * @View(serializerGroups={"allEtatsProjects"})
	 * @Get("/etatsprojects")
	 */
	public function getEtatProjects(Request $request)
	{
		$etats = $this->get('doctrine.orm.entity_manager')
				->getRepository('onyxHomeBundle:EtatsProject')
				->findAll();
		
		return $etats;
	}
	
	/**
	 * @View(serializerGroups={"etatsProjectsIDProjects"})
	 * @Get("/etatsprojects/{id}/projects")
	 */
	public function getProjectsAction(Request $request)
	{
		$etat= $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:EtatsProject')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		
		if (empty ($etat)) {
			return $this->etattNotFound();
		}
		
		return $etat->getProjects();
	}
	
	/**
	 * @View(statusCode=Response::HTTP_CREATED)
	 * @Post("/etatprojets/{id}/projects")
	 */
	public function postProjectsAction(Request $request)
	{
		$etat = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:EtatsProject')
		->find($request->get('id'));
		
		if (empty($etat)) {
			return $this->etattNotFound();
		}
		
		$projet = new Projet();
		$projet->setEtatprojet($etat); // Ici, le etat est associé au projets
		$form = $this->createForm(ProjectType::class, $projet);
		
		$form->submit($request->request->all());
		
		if ($form->isValid()) {
			$em = $this->get('doctrine.orm.entity_manager');
			$em->persist($projet);
			$em->flush();
			return $projet;
		} else {
			return $form;
		}
	}
	
	private function etattNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'Etat not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'Etat not found'], Response::HTTP_NOT_FOUND);
		
	}
}