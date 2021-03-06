<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 28/04/17
 * Time: 00:02
 */

namespace DiscordBundle\Form;

use DiscordBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class LoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Votre pseudo'
                ],
            ])
            ->add('password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'Votre mot de passe'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Connecte-toi !'
            ]);
    }


    public function configurationsOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,

        ));
    }
}



