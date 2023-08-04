<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Session;
use App\Form\SessionType;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $sessions = $entityManager->getRepository(Session::class)->findAll();

        // Redirige vers la création de session si aucune session n'existe
        if (!$sessions) {
            return $this->redirectToRoute('add_session');
        }
        // Affiche la liste des sessions
        else {
            return $this->render('session/index.html.twig', [
                'sessions' => $sessions,
            ]);
        }
    }
    #[Route('/session/add', name: 'add_session')]
    #[Route('/session/{id}/edit/', name: 'edit_session')]
    public function add(ManagerRegistry $doctrine, Session $session = null, Request $request): Response
    {
        if (!$session) {
            $session = new Session();
        }     
        $sessionForm = $this->createForm(SessionType::class, $session);
        $sessionForm->handleRequest($request);
        
        if ($sessionForm->isSubmitted() && $sessionForm->isValid()) {
            $session = $sessionForm->getData();
            $entityManager = $doctrine->getManager();
            
            $entityManager->persist($session);
            $entityManager->flush();
            
            return $this->redirectToRoute('add_session');
        }

        return $this->render('session/add.html.twig', [
            'formAddSession' => $sessionForm->createView(),
            'edit' => $session->getId()
        ]);
    }
    #[Route('/session/{id}/remove', name: 'remove_session')]
    public function remove(ManagerRegistry $doctrine, Session $session): Response
    {
        $entityManager = $doctrine->getManager();

        $entityManager->remove($session);
        $entityManager->flush();

        return $this->redirectToRoute('app_session');
    }


    #[Route('/session/{id}', name: 'info_session')]
    public function info(Session $session): Response
    {
        return $this->render('session/info.html.twig', [
            'session' => $session
        ]);
    }
}
