<?php

namespace App\Form;

use App\Entity\ResDemande;
use App\Entity\ResDevis;
use App\Entity\ResEntreprise;
use App\Entity\ResMateriel;
use App\Entity\ResService;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResDevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('cout',IntegerType::class, [
                'label' => 'Cout',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('entreprise',EntityType::class, [
                'class' => ResEntreprise::class,
                'label' => 'Entreprise',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('demande',EntityType::class, [
                'class' => ResDemande::class,
                'label' => 'Demande',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('demande',EntityType::class, [
                'class' => ResDemande::class,
                'label' => 'Demande',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('materiel',EntityType::class, [
                'class' => ResMateriel::class,
                'label' => 'Materiel',
                'attr' => ['class' => 'form-control'],
                'multiple' => true,
            ])
            ->add('service',EntityType::class, [
                'class' => ResService::class,
                'label' => 'Service',
                'attr' => ['class' => 'form-control'],
                'multiple'     => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ResDevis::class,
        ]);
    }
}
