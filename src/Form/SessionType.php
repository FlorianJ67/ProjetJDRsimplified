<?php

namespace App\Form;

use App\Entity\Caracteristique;
use App\Entity\Competence;
use App\Entity\Session;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SessionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom de la session'
            ])
            ->add('pointsCaracPersos', IntegerType::class, [
                'label' => 'Points de caractéristique de base'
            ])
            ->add('pointsCompPersos', IntegerType::class, [
                'label' => 'Points de compétence de base'
            ])
            ->add('caracteristique')
            ->add('competence', EntityType::class, [
                'class' => Competence::class,
                'label' => 'Competence'
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Session::class,
        ]);
    }
}
