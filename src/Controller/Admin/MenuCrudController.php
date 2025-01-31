<?php

namespace App\Controller\Admin;

use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use App\Entity\Page;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use App\Repository\PageRepository;
class MenuCrudController extends AbstractCrudController
{

    private PageRepository $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public static function getEntityFqcn(): string
    {
        return Menu::class;
    }

    public function configureFields(string $pageName): iterable
    {
        // Получаем все страницы для использования в ChoiceField
        $pages = $this->pageRepository->findAll();
        $choices = [];
        foreach ($pages as $page) {
            $choices[$page->getTitle()] = $page->getId(); // Используем title как метку, id как значение
        }
        $numbers = [0,1,2,3,4,5];

        return [
            // IdField::new('id')->hideOnForm(),
            ChoiceField::new('pages', 'Pages')
                ->setChoices($choices)
                ->allowMultipleChoices(), // Если поле поддерживает выбор нескольких значений
            ChoiceField::new('position', 'Position')
                ->setChoices($numbers),
        ];
    }

}
