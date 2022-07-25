<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Annonce;
use App\Entity\Category;
use App\Entity\Comments;
use App\Entity\Equipment;
use App\Entity\Destination;
use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('localisation')
            ->add('resume')
            ->add('publishedDate')
            ->add('modificationDate')
            ->add('periodDate')
            ->add('price')
            ->add('roomNumber')
            ->add('bedNumber')
            ->add('picture')
            ->add('personNumber')
            ->add('statut')
            ->add('author',EntityType::class,[
                'class'=> User::class,
                'choice_label'=>'name',
                'attr'=>[
                    'class'=>'form-control',
                ],
            ])
            ->add('reservations',EntityType::class,[
                'class'=> Reservation::class,
                'choice_label'=>'title',
                'mapped'=> false,
            ])
            ->add('equipments',EntityType::class,[
                'class'=> Equipment::class,
                'choice_label'=>'title',
                'mapped'=> false,
            ])
            ->add('comments',EntityType::class,[
                'class'=> Comments::class,
                'choice_label'=>'title',
                'mapped'=> false,
            ])
            ->add('categories',EntityType::class,[
                'class'=> Category::class,
                'choice_label'=>'title',
                'mapped'=> false,
            ])
            ->add('destinations',EntityType::class,[
                'class'=> Destination::class,
                'choice_label'=>'title',
                'mapped'=> false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
