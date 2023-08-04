<?php

namespace App\Form;

use App\Entity\Perso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('espece')
            ->add('origine')
            ->add('age')
            ->add('sante')
            ->add('santeMax')
            ->add('taille')
            ->add('poids')
            ->add('sexe')
            ->add('sessions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Perso::class,
        ]);
    }
}
