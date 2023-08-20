<?php

namespace App\Controller\Admin;

use App\Entity\Item;
use App\Entity\Perso;
use App\Entity\Session;
use App\Entity\Competence;
use App\Entity\Caracteristique;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\SessionCrudController;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(SessionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetJDRsimplified');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Session', 'fas fa-list', Session::class);
        yield MenuItem::linkToCrud('Perso', 'fas fa-list', Perso::class);
        yield MenuItem::linkToCrud('Competence', 'fas fa-list', Competence::class);
        yield MenuItem::linkToCrud('Caracteristique', 'fas fa-list', Caracteristique::class);
        yield MenuItem::linkToCrud('Item', 'fas fa-list', Item::class);
    }
}
