<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use App\Form\HeaderBlockType;
use App\Form\BlockType;
use App\Form\FooterBlockType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Doctrine\Common\Collections\ArrayCollection;


class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            // TextEditorField::new('content'),

            CollectionField::new('headerBlock', 'Header Blocks')
                ->setEntryType(HeaderBlockType::class)
                ->setFormTypeOption('by_reference', false) // Это важно!
                ->allowAdd()
                ->allowDelete(),
            CollectionField::new('bodyBlock', 'Body Blocks')
                ->setEntryType(BlockType::class)
                ->setFormTypeOption('by_reference', false) // Это важно!
                ->allowAdd()
                ->allowDelete(),
            CollectionField::new('footerBlock', 'Footer Blocks')
                ->setEntryType(FooterBlockType::class)
                ->setFormTypeOption('by_reference', false) // Это важно!
                ->allowAdd()
                ->allowDelete(),

            // ImageField::new('image')
            //     ->setBasePath('uploads/pages/images/') // Путь к папке для отображения
            //     ->setUploadDir('public/uploads/pages/images/') // Путь к папке для загрузки
            //     ->setUploadedFileNamePattern('[randomhash].[extension]') // Генерация уникального имени файла
            //     ->setRequired(false),

            TextField::new('slug'),
            // SlugField::new('slug', 'Slug')
            //     ->setTargetFieldName('slug') // Указываем поле для генерации slug
            //     ->setUnlockConfirmationMessage('Вы уверены, что хотите изменить slug вручную?'),
            BooleanField::new('is_published')
        ];
    }
}
