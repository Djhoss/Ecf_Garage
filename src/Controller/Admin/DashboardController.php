<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Entity\Service;
use App\Entity\Temoignage;
use App\Entity\User;
use App\Controller\Admin\MessageCrudController;
use App\Form\MessageFormType;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(MessageCrudController::class)->generateUrl();
        
        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecf Garage');
    }

    public function configureMenuItems(): iterable
    {
        // 
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Les utilisateurs', 'fas fa-list', User::class, ['role' => 'ROLE_ADMIN']) ;
        yield MenuItem::linkToCrud('Message page d\'accueil', 'fas fa-list', Message::class);
        yield MenuItem::linkToCrud('Les Services', 'fas fa-list', Service::class);
        yield MenuItem::linkToCrud('Les Témoignages', 'fas fa-list', Temoignage::class);
        yield MenuItem::linkToRoute('Ajouter un employé', 'fas fa-plus', 'app_register', ['role' => 'ROLE_ADMIN']);
        yield MenuItem::linkToRoute('Retour au site', 'fas fa-home', 'app_home');
    }
}
