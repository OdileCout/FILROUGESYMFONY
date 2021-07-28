<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Commandes;
use App\Entity\Commentaires;
use App\Entity\Produits;
use App\Entity\ProduitCommande;
use App\Entity\ArticlesBlog;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Filrougesymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-list', Commandes::class);
        yield MenuItem::linkToCrud('Commentaires', 'fas fa-list', Commentaires::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Produits::class);
        yield MenuItem::linkToCrud('ProduitCommande', 'fas fa-list', ProduitCommande::class);
        yield MenuItem::linkToCrud('ArticlesBlog', 'fas fa-list', ArticlesBlog::class);
    }
}
