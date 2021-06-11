<?php

namespace App\Controller\Admin;

use App\Entity\CoupDeCoeur;
use App\Entity\FinDeSerie;
use App\Entity\Products;
use App\Entity\ProductsClothes;
use App\Entity\Promo;
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
        yield MenuItem::linkToCrud('Gestion objet boutique', 'fas fa-list', Products::class);
        yield MenuItem::linkToCrud('Gestion textile boutique', 'fas fa-list', ProductsClothes::class);
        yield MenuItem::linkToCrud('Avis client', 'fas fa-list', Reviews::class);
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Coup de coeur', 'fas fa-list', CoupDeCoeur::class);
        yield MenuItem::linkToCrud('Promotion', 'fas fa-list', Promo::class);
        yield MenuItem::linkToCrud('Fin de série', 'fas fa-list', FinDeSerie::class);
    }
}
