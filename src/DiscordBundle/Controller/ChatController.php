<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\User;
use DiscordBundle\Form\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
$r->set('name', $register->getName());
            $em->persist($register);
            $em->flush();
            return $this->redirectToRoute('home');
        }








        return $this->render('DiscordBundle:Default:home.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
