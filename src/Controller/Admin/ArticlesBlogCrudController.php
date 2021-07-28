<?php

namespace App\Controller\Admin;

use App\Entity\ArticlesBlog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class ArticlesBlogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ArticlesBlog::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titre'),
            IntegerField::new('image'),
            TextEditorField::new('article'),
        ];
    }
   
}
