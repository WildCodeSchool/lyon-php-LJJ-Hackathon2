<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 28/04/17
 * Time: 01:56
 */

namespace DiscordBundle\Controller;

use DiscordBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@Discord/Default/home.html.twig', array(
            'name' => $lastUsername,
            'error' => $error,







            ));



    private function render($string, $array)
    {
    }

    private function get($string)
    {
    }
}
}