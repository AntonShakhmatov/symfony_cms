<?php

namespace App\Controller;

use App\Entity\PortfolioProject;
use App\Form\PortfolioProjectType;
use App\Repository\PortfolioProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/portfolio/project')]
final class PortfolioProjectController extends AbstractController
{
    #[Route(name: 'app_portfolio_project_index', methods: ['GET'])]
    public function index(PortfolioProjectRepository $portfolioProjectRepository): Response
    {
        return $this->render('portfolio_project/index.html.twig', [
            'portfolio_projects' => $portfolioProjectRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_portfolio_project_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $portfolioProject = new PortfolioProject();
        $form = $this->createForm(PortfolioProjectType::class, $portfolioProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($portfolioProject);
            $entityManager->flush();

            return $this->redirectToRoute('app_portfolio_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('portfolio_project/new.html.twig', [
            'portfolio_project' => $portfolioProject,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_portfolio_project_show', methods: ['GET'])]
    public function show(PortfolioProject $portfolioProject): Response
    {
        return $this->render('portfolio_project/show.html.twig', [
            'portfolio_project' => $portfolioProject,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_portfolio_project_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PortfolioProject $portfolioProject, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PortfolioProjectType::class, $portfolioProject);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_portfolio_project_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('portfolio_project/edit.html.twig', [
            'portfolio_project' => $portfolioProject,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_portfolio_project_delete', methods: ['POST'])]
    public function delete(Request $request, PortfolioProject $portfolioProject, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$portfolioProject->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($portfolioProject);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_portfolio_project_index', [], Response::HTTP_SEE_OTHER);
    }
}
