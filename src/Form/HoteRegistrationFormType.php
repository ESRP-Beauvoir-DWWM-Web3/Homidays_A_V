<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

  class HoteRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Photo', FileType::class, [
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new File([
                    'maxSize'=>'16384k',
                    'maxSizeMessage'=>'Taille de fichier trop grande',
                    'mimeTypes'=>[
                        'image/jpeg',
                        'image/png',
                        'image/svg',
                    ],
                    'mimeTypesMessage'=>'Extension de fichier invalide',
                ])
                ],
            'attr'=>[
                'class'=>'form-control',
            ],
            'data_class'=>null,
        ])  
         ->add('carte_identite', FileType::class, [
            'mapped' => false,
            'required' => true,
            'constraints' => [
                new File([
                     'maxSize'=>'16384k',
                    'maxSizeMessage'=>'Taille de fichier trop grande',
                     'mimeTypes'=>[
                        'file/pdf',
                        'file/word',
                    ],
                    'mimeTypesMessage'=>'Extension de fichier invalide',
                ])
                ],
            'attr'=>[
                'class'=>'form-control',
            ],
            'data_class'=>null,
        ])  
         ->add('justificatifDomicile', FileType::class, [
            'mapped' => false,
            'required' => true,
            'constraints' => [
                new File([
                    'maxSize'=>'16384k',
                    'maxSizeMessage'=>'Taille de fichier trop grande',
                    'mimeTypes'=>[
                        'file/pdf',
                        'file/word',
                    ],
                    'mimeTypesMessage'=>'Extension de fichier invalide',
                ])
                ],
            'attr'=>[
                'class'=>'form-control',
            ],
            'data_class'=>null,
        ])    
            ->add('name', TextType::class)
            ->add('firstName', TextType::class)
            ->add('birthDate' , DateType::class,[
                'widget' => 'choice',
                'years' => range(date('Y')-100,date('Y')-20)
            ])
            ->add('phoneNumber',TextType::class )
            ->add('address',TextareaType::class)
            ->add('town', TextType::class)
            ->add('zipCode', IntegerType::class)
            ->add('email',EmailType::class, [
                'attr'=>[
                    'class'=>'form-control',
                ],
            ])
             
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => 'true',
                'invalid_message' => 'Les mdp ne correspondent pas',
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => ['class' => 'form-control']
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => ['class' => 'form-control']
                ],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisation.',
                    ]),
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
