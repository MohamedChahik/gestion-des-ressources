<?php

namespace App\Form;

use App\Entity\ResEntreprise;
use App\Entity\ResMarque;
use App\Entity\ResMateriel;
use App\Entity\ResType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResMaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description',TextType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('prix',IntegerType::class, [
                'label' => 'Prix',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('type',EntityType::class, [
                'class' => ResType::class,
                'label' => 'Type',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('marque',EntityType::class, [
                'class' => ResMarque::class,
                'label' => 'Marque',
                'attr' => ['class' => 'form-control'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ResMateriel::class,
        ]);
    }
}
