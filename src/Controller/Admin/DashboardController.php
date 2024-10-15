<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Генерируем URL для сущности Section
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(SectionCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Your Admin Panel');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Sections', 'fas fa-list', Section::class), // Ссылка на сущность Section
        ];
    }
}
