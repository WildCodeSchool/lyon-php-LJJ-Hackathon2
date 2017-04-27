<?php

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\User;
use DiscordBundle\Form\RegisterForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $register = new User();

        $form = $this->createForm(RegisterForm::class, $register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $em->persist($register);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('DiscordBundle:Default:home.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}
