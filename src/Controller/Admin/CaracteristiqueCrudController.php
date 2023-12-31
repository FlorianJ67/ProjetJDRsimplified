<?php

namespace App\Controller\Admin;

use App\Entity\Caracteristique;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CaracteristiqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Caracteristique::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom')
        ];
    }
    
}
