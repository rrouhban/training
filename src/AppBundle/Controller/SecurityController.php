<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('security/login.html.twig', [
            'error' => ['message' => 'une erreur ?'],
            'last_username' => 'superadmin ?',
        ]);
    }

    /**
     * @Route("/game/login-check", name="app_login_check")
     */
    public function loginCheckAction()
    {
        // Code never executed as the firewall intercept the request before the
        // Routing component can even match the pattern with the action.
    }

    /**
     * @Route("/game/logout", name="app_logout")
     */
    public function logoutAction()
    {
        // Code never executed as the firewall intercept the request before the
        // Routing component can even match the pattern with the action.
    }

    public function lastUsersAction()
    {
        // TODO
    }
}