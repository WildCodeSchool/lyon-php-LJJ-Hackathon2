<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\Message;
use DiscordBundle\Entity\User;
use DiscordBundle\Form\ChatForm;
use DiscordBundle\Form\LoginForm;
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

        /**
         * Login part
         */
        $session = $request->getSession();
        $register2 = new User();
        $form2 = $this->createForm(LoginForm::class, $register2);
        $form2->handleRequest($request);
        if ($form2->isSubmitted() && $form2->isValid()){
            $session->set('name', $register->getName());
            $session->getFlashBag()->add('notice', 'Vous êtes connecté !');
            return $this->redirectToRoute('home');
        }

        foreach ($session->getFlashBag()->get('notice', array()) as $message){
            echo '<div class="flash-notice">' . $message . '</div>';
        }

        /**
         * Message part
         */
        $display = new Message();
        $display->setDatetime(date('d-m-Y H:i:s'));
        $form3 = $this->createForm(ChatForm::class, $display);
        $form3->handleRequest($request);

        if ($form3->isSubmitted() && $form3->isValid()) {
            $em->persist($display);
            $em->flush();
            return $this->redirectToRoute('home'); /** To be deleted later */
        }
        return $this->render('DiscordBundle:Default:home.html.twig', array(
            'form' => $form->createView(),
            'form2' => $form2->createView(),
            'form3' => $form3->createView(),
        ));
    }
    /**
     * Disconnect
     * @Route("/disconnect", name="disconnect")
     */
    public function disconnectAction()
    {
        $this->get('session')->invalidate();
        $session = $this->get('session');
        return $this->render('DiscordBundle:Default:disconnect.html.twig', array(
            'session' => $session
        ));
    }

}
