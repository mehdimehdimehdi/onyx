<?php
namespace onyx\HomeBundle\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use onyx\HomeBundle\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;
use onyx\HomeBundle\Form\Type\UtilisateurType;

class UtilisateurController extends Controller
{
	
    /**
     * @View(serializerGroups={"allUser"})
     * @Get("/users")
     */
    public function getUsersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
                ->getRepository('onyxHomeBundle:Utilisateur')
                ->findAll();
        
        return $users;
    }
    
    /**
     * @View(serializerGroups={"UserID"})
     * @Get("/users/{id}")
     */
    public function getUserAction(Request $request)
    {
    	$user = $this->get('doctrine.orm.entity_manager')
    	->getRepository('onyxHomeBundle:Utilisateur')
    	->find($request->get('id'));
    	
    	if (empty($user)) {
    		return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
    	}
    	
    	return $user;
    }
    
    /**
     * @View(statusCode=Response::HTTP_CREATED)
     * @Post("/users")
     */
    public function postUsersAction(Request $request)
    {
    	$user = new Utilisateur();
    	$form = $this->createForm(UtilisateurType::class, $user);
    	
    	$form->submit($request->request->all());
    	
    	if ($form->isValid()) {
    		$em = $this->get('doctrine.orm.entity_manager');
    		$em->persist($user);
    		$em->flush();
    		return $user;
    	} else {
    		return $form;
    	}
    }
    
    /**
     * @View(statusCode=Response::HTTP_NO_CONTENT)
     * @Delete("/users/{id}")
     */
    public function removeUserAction(Request $request)
    {
    	$em = $this->get('doctrine.orm.entity_manager');
    	$user = $em->getRepository('onyxHomeBundle:Utilisateur')
    	->find($request->get('id'));
    	
    	if ($user) {
    		$em->remove($user);
    		$em->flush();
    	}
    }
    
    /**
     * @View()
     * @Patch("/users/{id}")
     */
    public function patchUserAction(Request $request)
    {
    	return $this->updateUser($request, false);
    }
    
    private function updateUser(Request $request, $clearMissing)
    {
    	$user = $this->get('doctrine.orm.entity_manager')
    	->getRepository('onyxHomeBundle:Utilisateur')
    	->find($request->get('id')); // L'identifiant en tant que paramètre n'est plus nécessaire
    	/* @var $user User */
    	
    	if (empty($user)) {
    		return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
    	}
    	
    	$form = $this->createForm(UtilisateurType::class, $user);
    	
    	$form->submit($request->request->all(), $clearMissing);
    	
    	if ($form->isValid()) {
    		$em = $this->get('doctrine.orm.entity_manager');
    		$em->persist($user);
    		$em->flush();
    		return $user;
    	} else {
    		return $form;
    	}
    }
}