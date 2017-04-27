<?php

namespace DiscordBundle\Form;

use DiscordBundle\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChatForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', TextareaType::class, [
                'attr'  => [
                    'rows'          => '3',
                    'placeholder'   => 'Mon message'
                ],
            ])
            ->add('submit', SubmitType::class, ['label' => 'Envoyer']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Message::class,
        ));
    }

    public function getBlockPrefix()
    {
        return 'discord_bundle_message';
    }

}