<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use App\Entity\Page;
use App\Entity\Post;
use App\Entity\Category;
use App\Entity\Tags;
use App\Entity\Images;
use App\Entity\Font;
use App\Entity\Comment;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Menu\MenuItemInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="..."> Portfolio')
            ->setDefaultColorScheme('dark');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('Categories', 'fa fa-tags', Category::class);
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Content'),
            MenuItem::linkToCrud('Menu', 'fa fa-file-text', Menu::class),
            MenuItem::linkToCrud('Create page', 'fa fa-book', Page::class),
            MenuItem::linkToCrud('Posts', 'fa fa-tags', Post::class),
            MenuItem::linkToCrud('Category', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Tags', 'fa fa-tags', Tags::class),

            MenuItem::section('Design'),
            MenuItem::linkToCrud('Images', 'fa fa-images', Images::class),
            MenuItem::linkToCrud('Font', 'fa fa-pen', Font::class),

            MenuItem::section('Users'),
            // MenuItem::linkToCrud('Comments', 'fa fa-comment', Comment::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
