<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function loginAction(AuthenticationUtils $tools)
    {
        return $this->render('security/login.html.twig', [
            'error' => $tools->getLastAuthenticationError(),
            'last_username' => $tools->getLastUsername(),
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