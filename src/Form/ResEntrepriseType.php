<?php

namespace App\Form;

use App\Entity\ResEntreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResEntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('ville',TextType::class, [
                'label' => 'Ville',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('adresse',TextType::class, [
                'label' => 'Adresse',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('code_postal',IntegerType::class, [
                'label' => 'Code postal',
                'attr' => ['class' => 'form-control'],
            ])
         //   ->add('submit',SubmitType::class, [
         //       'attr' => ['class' => 'btn btn-lg btn-success'],
         //   ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ResEntreprise::class,
        ]);
    }
}
