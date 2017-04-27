<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $msg = new Message();
        $msg->setTask('Write a blog post');
        $msg->setDueDate(new \DateTime());

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('dueDate', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        return $this->render('@Discord/Default/home.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
