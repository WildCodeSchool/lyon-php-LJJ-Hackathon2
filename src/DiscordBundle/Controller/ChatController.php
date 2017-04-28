<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\Message;
use DiscordBundle\Entity\User;
use DiscordBundle\Form\ChatForm;
use DiscordBundle\Form\LoginForm;
use DiscordBundle\Form\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Response;
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
            $session->set('name', $register2->getName());
            $session->set('user', 'true');
            $session->getFlashBag()->add('notice', 'Vous êtes connecté !');
            return $this->redirectToRoute('home');
        }

        foreach ($session->getFlashBag()->get('notice', array()) as $message){
            echo '<div class="flash-notice">' . $message . '</div>';
        }

        /**
         *  Get all message
         */
        $repository = $this->getDoctrine()->getRepository('DiscordBundle:Message');
        $messages = $repository->findAll();

        /**
         * Message part
         */
        $display = new Message();
        $display->setDatetime(new \DateTime("now"));
        $user_name = $session->get('name');
        $display->setUsername($user_name);

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
            'messages' => $messages,
            'username' => $user_name,
            'session' => $session
        ));
    }
    /**
     * Disconnect
     * @Route("/disconnect", name="disconnect")
     */
    public function disconnectAction()
    {
        $this->get('session')->invalidate();
        return $this->render('DiscordBundle:Default:redirect.html.twig');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $message = $em->getRepository('DiscordBundle:Message')->find($id);
        $em->remove($message);
        $em->flush();
        return $this->render('DiscordBundle:Default:redirect.html.twig');
    }

}
