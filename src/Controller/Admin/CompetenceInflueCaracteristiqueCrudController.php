<?php

namespace App\Controller\Admin;

use App\Entity\CompetenceInflueCaracteristique;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CompetenceInflueCaracteristiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CompetenceInflueCaracteristique::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
