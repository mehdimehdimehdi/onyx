<?php

namespace onyx\HomeBundle\Controller\Project;

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



class ProjectController extends Controller
{
	/**
	 * @View(serializerGroups="allProjects")
	 * @Get("/projects")
	 */
	public function getAllProjects(Request $request)
	{
		$projets = $this->get('doctrine.orm.entity_manager')
				->getRepository('onyxHomeBundle:Projet')
				->findAll();
		
		return $projets;
	}
	
	/**
	 * @View(serializerGroups={"projectID"})
	 * @Get("/projects/{id}")
	 */
	public function getUserAction(Request $request)
	{
		$projet = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Projet')
		->find($request->get('id'));
		
		if (empty($projet)) {
			return new JsonResponse(['message' => 'Projet not found'], Response::HTTP_NOT_FOUND);
		}
		
		return $projet;
	}
	
	/**
	 * @View(serializerGroups="userIDProjet")
	 * @Get("/users/{id}/projects")
	 */
	public function getProjectsAction(Request $request)
	{
		$user = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Utilisateur')
		->find($request->get('id')); // L'identifiant en tant que paramétre n'est plus nécessaire
		/* @var $user Utilisateur */
		
		if (empty($user)) {
			return $this->usertNotFound();
		}
		
		return $user->getProjects();
	}
	
	/**
	 * @View(statusCode=Response::HTTP_CREATED)
	 * @Post("/users/{id}/projects")
	 */
	public function postProjectsAction(Request $request)
	{
		$user = $this->get('doctrine.orm.entity_manager')
		->getRepository('onyxHomeBundle:Utilisateur')
		->find($request->get('id'));
		
		if (empty($user)) {
			return $this->usertNotFound();
		}
		
		$projet = new Projet();
		$projet->setUser($user); // Ici, le user est associé au projets
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
	
	private function usertNotFound()
	{
		//return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
		
	}
}