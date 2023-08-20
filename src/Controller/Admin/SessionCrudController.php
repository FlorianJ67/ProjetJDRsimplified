<?php

namespace App\Controller\Admin;

use App\Entity\Session;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Session::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            NumberField::new('points_carac_persos'),
            AssociationField::new('caracteristique')
                ->onlyOnIndex(),
            ArrayField::new('caracteristique')
                ->onlyOnDetail(),
            NumberField::new('points_comp_persos'),
            AssociationField::new('competence')
                ->onlyOnIndex(),
            ArrayField::new('competence')
                ->onlyOnDetail(),
            BooleanField::new('statut')
        ];
    }
}
