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

class AccountChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Mon adresse email',
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'Mon prénom',
            ])
            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'Mon nom',
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre mot de passe'
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identiques',
                'required' => true,
                'first_options' => [
                    'label' => 'Mon nouveau mot de passe',
                    'attr' => [
                        "placeholder" => "Votre nouveau mot de passe"
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer votre nouveau  mot de passe',
                    'attr' => [
                        "placeholder" => "Merci de confirmer votre nouveau mot de passe"
                    ],
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Mettre à jour",
                'attr' => [
                    "class" => "btn btn-success btn-block btn-lg"
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
