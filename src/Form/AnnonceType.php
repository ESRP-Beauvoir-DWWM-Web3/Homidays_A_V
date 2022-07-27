<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Annonce;
use App\Entity\Category;
use App\Entity\Comments;
use App\Entity\Equipment;
use App\Entity\Destination;
use App\Entity\Reservation;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Titre'
            ])
            
            ->add('picture', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Images'
            ])

            ->add('description', TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Description'
            ])
            
            ->add('resume', TextareaType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Résumé'
            ])
            
            ->add('town', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                
                ],
                'label'=>'Ville'
            ])

            ->add('localisation', ChoiceType::class,[
                'choices' => [
                    'Périphérie éloignée'=>'périphérie éloignée',
                    'Périphérie'=>'périphérie',
                    'Centre-ville'=>'centre-ville',
                    'Hyper-centre'=>'hyper-centre'
                ],
                // pour faire une liste
                'expanded'=>'false',
                'label'=>'Localisation',
                'choice_attr'=>[
                    'Périphérie éloignée'=>['class'=>'me-1'],
                    'Périphérie'=>['class'=>'me-1 ms-5'],
                    'Centre-ville'=>['class'=>'me-1 ms-5'],
                    'Hyper-centre'=>['class'=>'me-1 ms-5']
                ],
                'attr'=>[
                    'class'=>'form-control',
                ],
            ])

             ->add('destinations',EntityType::class,[
                'class'=> Destination::class,
                'label'=>'Destination',
                'choice_label'=>'title',
                'expanded'=>true,
                'mapped'=> false,
                'choice_attr'=>[
                    'Mer'=>['class'=>'me-1'],
                    'Campagne'=>['class'=>'me-1 ms-5'],
                    'Montagne'=>['class'=>'me-1 ms-5']
                ],
                'attr'=>[
                    'class'=>'form-control',
                ], 
            ]) 
            
            ->add('categories',EntityType::class,[
                'class'=> Category::class,
                'choice_label'=>'title',
                'mapped'=> false,
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Type de biens'
            ])
           /* ->add('publishedDate', DateType::class,[
                'widget' => 'choice',
                'years' => range(date('Y'),date('Y')),
                'attr'=>[
                    'class'=>'form-control',
                ],
            ])
             ->add('modificationDate', DateType::class,[
                'widget' => 'choice',
                'years' => range(date('Y')-100,date('Y')-20),
                'attr'=>[
                    'class'=>'form-control',
                ],
            ]) */
            ->add('periodDate', DateType::class,[
                'widget' => 'choice',
                //'weeks' => range(1, 52),
                'years' => range(date('Y')-100,date('Y')-20),
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Date de réservation'
            ])
            ->add('price', TextType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Prix'
            ])
            ->add('roomNumber', IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Nombre de chambres'
            ])
            ->add('bedNumber', IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Nombre de lits'
            ])
            
            ->add('personNumber', IntegerType::class,[
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Nombre de personnes'
            ])
           
            
            
            
            /* ->add('reservations',EntityType::class,[
                'class'=> Reservation::class,
                'choice_label'=>'title',
                'mapped'=> false,
                'attr'=>[
                    'class'=>'form-control',
                ],
            ]) */

            ->add('equipments',EntityType::class,[
                'class'=> Equipment::class,
                'choice_label'=>'title',
                'expanded'=>'false',
                 'multiple'=>'true',
                'attr'=>[
                    'class'=>'form-control',
                ], 
                'label'=>'Équipements proposés'
            ])
/*  */
            ->add('author',EntityType::class,[
                'class'=> User::class,
                'choice_label'=>'name',
                'attr'=>[
                    'class'=>'form-control',
                ],
                'label'=>'Annonce publiée par'
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

            /* ->add('comments',EntityType::class,[
                'class'=> Comments::class,
                'choice_label'=>'title',
                'mapped'=> false,
                'attr'=>[
                    'class'=>'form-control',
                ],
            ]) */
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
