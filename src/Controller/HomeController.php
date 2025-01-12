<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $projects = [
            ['image' => 'images/project-item-01.jpg', 'title' => 'Best Design', 'description' => 'Lorem ipsum dolor...'],
            ['image' => 'images/project-item-02.jpg', 'title' => 'Creative Pen', 'description' => 'Lorem ipsum dolor...'],
            ['image' => 'images/project-item-03.jpg', 'title' => 'Nice Capture', 'description' => 'Lorem ipsum dolor...'],
            // Добавь остальные проекты по аналогии
        ];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'projects' => $projects,
        ]);
    }
}
