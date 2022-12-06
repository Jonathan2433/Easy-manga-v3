<?php

namespace App\Controller\Admin;

use App\Entity\Mangas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MangasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Mangas::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('img'),

            IntegerField::new('chapters'),
            IntegerField::new('volumes'),
            TextField::new('published'),
            TextareaField::new('synopsis'),
            IntegerField::new('id_api'),
            BooleanField::new('is_for_adult'),
            BooleanField::new('is_categorize'),
        ];
    }
}
