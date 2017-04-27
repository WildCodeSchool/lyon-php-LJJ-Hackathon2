<?php

namespace DiscordBundle\Form;

use DiscordBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegisterForm
 * @package DiscordBundle\Form
 */
class RegisterForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr'  => [
                    'placeholder'   => 'Username'
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr'  => [
                    'placeholder'   => 'Password'
                ],
            ])
            ->add('submit', SubmitType::class, ['label' => 'S\'inscrire']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'discord_bundle_message';
    }

}