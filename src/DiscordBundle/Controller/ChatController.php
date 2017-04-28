<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\Message;
use DiscordBundle\Entity\User;
use DiscordBundle\Form\ChatForm;
use DiscordBundle\Form\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ChatController extends Controller
{
    /**
     * @param Request $request
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        /**
         * Register part
         */
        $em = $this->getDoctrine()->getManager();
        $register = new User();
        $form = $this->createForm(RegisterForm::class, $register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($register);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        $session = new Session();

        /**
         * Login part
         */
        if ($form->isSubmitted() && $form->isValid()){
            $session->start();
            $session->set('name', $register->getName());
            $session->getFlashBag()->add('notice', 'Vous êtes connecté !');

            $em->persist($register);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        foreach ($session->getFlashBag()->get('notice', array()) as $message){
            echo '<div class="flash-notice">' . $message . '</div>';
        }

        /**
         * "Post a message" part
         */
        $display = new Message();
        $display->setDatetime(date('d-m-Y H:i:s'));
        $form2 = $this->createForm(ChatForm::class, $display);
        $form2->handleRequest($request);

        if ($form->isSubmitted() && $form2->isValid()) {
            $em->persist($display);
            $em->flush();
            return $this->redirectToRoute('home'); /** To be deleted later */
        }
        return $this->render('DiscordBundle:Default:home.html.twig', array(
            'form' => $form->createView(),
            'form2' => $form2->createView(),
        ));

    }
}
