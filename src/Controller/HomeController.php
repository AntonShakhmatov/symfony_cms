<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\MenuRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(MenuRepository $menuRepository): Response
    {

        // Получение данных из базы
        $posts = $menuRepository->findBy([], ['position' => 'ASC']);

        $projects = [
            ['image' => 'images/project-item-01.jpg', 'title' => 'Best Design', 'description' => 'Lorem ipsum dolor...'],
            ['image' => 'images/project-item-02.jpg', 'title' => 'Creative Pen', 'description' => 'Lorem ipsum dolor...'],
            ['image' => 'images/project-item-03.jpg', 'title' => 'Nice Capture', 'description' => 'Lorem ipsum dolor...'],
            // Добавь остальные проекты по аналогии
        ];

        $host = $_SERVER['HTTP_HOST'];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'posts' => $posts,
            'projects' => $projects,
            'host' => $host
        ]);
    }

    // public function getMenu(MenuRepository $menuRepository): Response
    // {
    //     // Получение данных из базы
    //     $posts = $menuRepository->findBy([], ['createdAt' => 'ASC']);

    //     // Передача данных в шаблон
    //     return $this->render('home/index.html.twig', [
    //         'controller_name' => 'HomeController',
    //         'posts' => $posts,
    //     ]);
    // }
}
