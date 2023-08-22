<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersoController extends AbstractController
{
    #[Route('/perso', name: 'app_perso')]
    public function index(): Response
    {
        return $this->render('perso/index.html.twig', [
            'controller_name' => 'PersoController',
        ]);
    }

    #[Route('/perso/{id}', name: 'info_perso')]
    public function info(Perso $perso): Response
    {
        return $this->render('perso/info.html.twig', [
            'perso' => $perso
        ]);
    }
}
