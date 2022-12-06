<?php

namespace App\Controller\Admin;

use App\Entity\Genders;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GendersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Genders::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            IntegerField::new('id_api'),
            BooleanField::new('is_for_adult')
        ];
    }
}
