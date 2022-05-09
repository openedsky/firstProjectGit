<?php

namespace App\Form;

use App\Entity\UserDeco;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => "Prénom",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 255,
                    'minMessage' => 'Le prénom doit comporter au moins {{ limit }} caractères',
                    'maxMessage' => 'le prénom ne peut pas dépasser {{ limit }} caractères',
                ]),
                'attr' => [
                    "placeholder" => "Merci de saisir le prénom"
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => "Nom",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 255,
                    'minMessage' => 'Le nom doit comporter au moins {{ limit }} caractères',
                    'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères',
                ]),
                'attr' => [
                    "placeholder" => "Merci de saisir le nom"
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => "Email",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 100,
                    'minMessage' => 'L\'email doit comporter au moins {{ limit }} caractères',
                    'maxMessage' => 'L\' email ne peut pas dépasser {{ limit }} caractères',
                ]),
                'attr' => [
                    "placeholder" => "Merci de saisir l'email",
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identiques',
                'label' => "Mot de passe",
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        "placeholder" => "Merci de saisir le mot de passe"
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => [
                        "placeholder" => "Merci de confirmer le mot de passe"
                    ],
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Enregistrer",
                'attr' => [
                    "class" => "btn btn-success btn-block",
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UserDeco::class,
        ]);
    }
}
