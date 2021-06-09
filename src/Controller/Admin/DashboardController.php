<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use App\Entity\Reviews;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/gestion_admin", name="gestion_admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le mouton des villes');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Vers le site', 'fa fa-home', 'default');
        yield MenuItem::linkToCrud('Products', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Reviews', 'fas fa-list', Reviews::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
    }
}
