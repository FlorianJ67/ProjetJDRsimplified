<?php

namespace App\Controller\Admin;

use App\Entity\Session;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\CaracteristiqueCrudController;

class SessionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Session::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            BooleanField::new('statut','État'),
            FormField::addPanel('Configurer les personnages de la session'),
            NumberField::new('points_carac_persos','Points de Caractérisique à répartir'),
            // AssociationField::new('caracteristiques','Caractéristique')
            // ->setFormTypeOptions([
            //     'by_reference' => false
            // ]),
                // ->setCrudController(CaracteristiqueCrudController::class),
                // ->onlyOnIndex(),
            // ArrayField::new('caracteristique'),
                // ->onlyOnDetail(),
            NumberField::new('points_comp_persos','Points de Compétence à répartir'),
            // AssociationField::new('competences','Competence') 
            // ->setFormTypeOptions([
            //         'by_reference' => false
            //     ]),
                // ->setCrudController(CompetenceCrudController::class),
                // ->onlyOnIndex(),
            // ArrayField::new('competence'),
                // ->onlyOnDetail()
        ];
    }
}
