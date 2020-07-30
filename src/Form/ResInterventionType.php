<?php

namespace App\Form;

use Aliecom\ReportingBundle\Form\Type\EntrepriseType;
use App\Entity\ResEntreprise;
use App\Entity\ResIntervention;
use App\Entity\ResTechnicien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResInterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description',TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('lieu',TextType::class, [
                'label' => 'Lieu',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('date',DateType::class, [
                'label' => 'Date',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('technicien',EntityType::class, [
                'class' => ResTechnicien::class,
                'label' => ' ',
                'multiple' => true,
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('entreprise',EntityType::class, [
                'class' => ResEntreprise::class,
                'label' => ' ',
                'required' => true,
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ResIntervention::class,
        ]);
    }
}
