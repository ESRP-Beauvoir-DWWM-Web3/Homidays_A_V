<?php

namespace App\Form;

use App\Entity\Equipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('title', TextType::class,[
            'attr'=>[
                'class'=>'form-control',
            ],
        ])
        
        ->add('equipmentType',CheckboxTtype::class,[
            'choices' => [
                'Cuisine'=>'cuisine',
                'Chambre et Linge'=>'chambre et linge',
                'Divertissement'=>'divertissement',
                'Divers'=>'divers',
                'High-tech'=>'high-tech',
                'Service'=>'service',
                'Stationnement'=>'stationnement',
            ],
            ])
            
            ->add('statut',ChoiceType::class,[
            'choices'=>[
                'Activé'=>'activé',
                'Désactivé'=>'désactivé',
            ],
            'attr'=>[
                'class'=>'form-control',
            ],
        ])
        //->add('annonces')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
