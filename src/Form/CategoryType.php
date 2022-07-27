<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('title', TextType::class, [
                'attr'=> [
                    'class'=>'form-control',
                ],
            ])
            ->add('statut', ChoiceType::class, [
                'choices'=>[
                    'Activé'=>'activé',
                    'Désactivé'=>'désactivé'
                ]
            ])
            ->add('description', TextType::class, [

            ])
        
        ->add('title', TextType::class, [
            'attr'=> [
                'class'=>'form-control',
            ],
        ])
        
        ->add('description', TextType::class, [

        ])
        
        ->add('statut', ChoiceType::class, [
            'choices'=>[
                'Activé'=>'activé',
                'Désactivé'=>'désactivé'
            ]
        ])
    ; 

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
