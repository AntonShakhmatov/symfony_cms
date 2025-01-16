<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use  Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

    // #[Route('/images', name: 'images')]
    // public function index(): Response
    // {
    //     return $this->render('admin/images/image.html.twig',);
    // }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('path')
                ->setBasePath('uploads/images/') // Путь к папке для отображения
                ->setUploadDir('public/uploads/images/') // Путь к папке для загрузки
                ->setUploadedFileNamePattern('[randomhash].[extension]') // Генерация уникального имени файла
                ->setRequired(false),
        ];
    }
}
