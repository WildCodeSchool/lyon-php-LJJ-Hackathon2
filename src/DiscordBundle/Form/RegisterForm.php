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

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr'  => [
                    'placeholder' => 'Tapez votre pseudo ici'
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr'  => [
                    'placeholder' => 'Password'
                ],
            ])
            ->add('submit', SubmitType::class, ['label' => 'S\'inscrire']);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }



}