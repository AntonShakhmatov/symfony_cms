<?php

namespace App\Controller\Admin;

use App\Entity\BlogPost;
use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard/my-dashboard.html.twig');

        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        // // Option 1. Make your dashboard redirect to the same page for all users
        // return $this->redirect($adminUrlGenerator->setController(SectionCrudController::class)->generateUrl());

        // // Option 2. Make your dashboard redirect to different pages depending on the user
        // if ('jane' === $this->getUser()) {
        //     return $this->redirect('app_home');
        // }
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        // return [
        //     MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

        //     MenuItem::section('Blog'),
        //     MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class),
        //     MenuItem::linkToCrud('Blog Posts', 'fa fa-file-text', BlogPost::class),

        //     MenuItem::section('Users'),
        //     MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
        //     MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        // ];
    }
}
