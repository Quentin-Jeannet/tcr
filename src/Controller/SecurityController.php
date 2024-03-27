<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", priority=10, name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request, TranslatorInterface $translator): Response
    {

        // if (array_key_exists('_route', $request->attributes->all()) && count($request->request->all()) == 0 ) {
        //     return $this->redirectToRoute('home');
        // }
        // get the login error if there is one
        $referer = $request->headers->get('referer');
        if (!str_contains($referer, '?modal=true')) {
            $referer = $referer.'?modal=true';
        }
        $error = $authenticationUtils->getLastAuthenticationError();
        $message = $translator->trans($error->getMessageKey(), [], 'security');
        $lastUsername = $authenticationUtils->getLastUsername();
        // dd($lastUsername);
        $this->addFlash('loginError', $message);
        $this->addFlash('loginUser', $lastUsername);

        // last username entered by the user
        

        return $this->redirect($referer);
    }

    /**
     * @Route("/logout", priority=10, name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
