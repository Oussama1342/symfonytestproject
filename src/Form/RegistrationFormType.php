<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom d\'utilisateur doit contenir au moins {{ limit }} caractères.',
                    ]),
                ],
                'attr' => array(
          'placeholder' => 'Tapez votre login ...'
      )
            ])
            ->add('email', EmailType::class,[
                         'attr' => array(
                         'placeholder' => 'Tapez votre email...'
      )
            ])
            ->add('plainPassword', PasswordType::class, [

                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password...',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                        'attr' => array(
                         'placeholder' => 'Tapez votre mot de passe...'
      )
            ])
            ->add('confirm_password', PasswordType::class,[
                         'attr' => array(
                         'placeholder' => 'Retapez votre mot de passe...'
      )
            ])

       
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
