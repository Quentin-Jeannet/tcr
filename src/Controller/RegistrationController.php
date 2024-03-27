<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    /**
     * @Route("/register", priority=10, name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, UserRepository $userRepository, TranslatorInterface $translator)
    {
        $message = '';
        $user = new User();
        $email = $request->request->get('email');
        $registerPassword = $request->request->get('registerPassword');
        $confirmPassword = $request->request->get('confirmPassword');
        $submittedToken = $request->request->get('_csrf_token');
        $referer = $request->headers->get('referer');
        if (!str_contains($referer, '?modal=register')) {
            $referer = $referer . '?modal=register';
        }
        if (!str_contains($referer, '?modal=true')) {
            str_replace('?modal=true', '?modal=register', $referer);
        }

        $existingUser = $userRepository->findOneBy(['email' => $email]);
        if ($existingUser) {
            $message = $translator->trans('front.login.email_already_used');
            $this->addFlash('errorEmail', $message);
        }

        if ($registerPassword != $confirmPassword) {
            $message = $translator->trans('front.login.password_not_match');
            $this->addFlash('errorPassword', $message);
        }
        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $registerPassword)) {
            $message = $translator->trans('front.login.password_pregmatch');
            $this->addFlash('errorPassword', $message);
        }

        if ($message != '') {
            return $this->redirect($referer);
        }


        if ($this->isCsrfTokenValid('register', $submittedToken)) {
            $user->setRoles(["ROLE_USER"]);
            $user->setEmail($email);
                    // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $registerPassword
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $message = $translator->trans('front.email.message');
            $thanks = $translator->trans('front.email.thanks');
            $welcome = $translator->trans('front.email.welcome');
            $expire = $translator->trans('front.email.expire');
            $confirm = $translator->trans('front.email.confirm');

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('no-reply-tcr@graphikchannel.net', 'The Color Republic'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
                    ->context([
                        'message' => $message,
                        'expire' => $expire,
                        'confirm' => $confirm,
                        'thanks' => $thanks,
                        'welcome' => $welcome,
                    ])
            );
            
            return $this->redirectToRoute('app_register_success');
        }
        $this->addFlash('danger', 'Une erreur est survenue!');
        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/register/test", priority=10, name="app_register_test")
     */
    public function registerTest(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, UserRepository $userRepository, TranslatorInterface $translator)
    {
        $message = '';
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        // dd($form->getErrors());
        $referer = $request->headers->get('referer');
        if (!str_contains($referer, '?modal=register')) {
            $referer = $referer . '?modal=register';
        }
        if (!str_contains($referer, '?modal=true')) {
            str_replace('?modal=true', '?modal=register', $referer);
        }

        $existingUser = $userRepository->findOneBy(['email' => $form->get('email')->getData()]);
        if ($existingUser) {
            $message = $translator->trans('front.login.email_already_used');
            $this->addFlash('errorEmail', $message);
        }

        if (!(count(array_unique($form->get('password')->getViewData())) === 1)) {
            $message = $translator->trans('front.login.password_not_match');
            $this->addFlash('errorPassword', $message);
        }
        if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $form->get('password')->getData())) {
            $message = $translator->trans('front.login.password_pregmatch');
            $this->addFlash('errorPassword', $message);
        }

        if ($message != '') {
            return $this->redirect($referer);
        }


        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(["ROLE_USER"]);
                    // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            $message = $translator->trans('front.email.message');
            $thanks = $translator->trans('front.email.thanks');
            $welcome = $translator->trans('front.email.welcome');
            $expire = $translator->trans('front.email.expire');
            $confirm = $translator->trans('front.email.confirm');

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('no-reply-tcr@graphikchannel.net', 'The Colour Republic'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
                    ->context([
                        'message' => $message,
                        'expire' => $expire,
                        'confirm' => $confirm,
                        'thanks' => $thanks,
                        'welcome' => $welcome,
                    ])
            );
            
            return $this->redirectToRoute('app_register_success');
        }
        $this->addFlash('danger', 'Une erreur est survenue!');
        return $this->redirectToRoute('register_view');
    }

    public function registerView(): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user,[
            'action' => $this->generateUrl('app_register_test'),
        ]);
        
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/register/view", name="register_view")
     */
    public function registerViewAction()
    {
        return $this->render('registration/registerView.html.twig');
    }


    /**
     * @Route("/register/success", name="app_register_success")
     */
    public function registerSuccess()
    {
        return $this->render('registration/success.html.twig');
    }


    /**
     * @Route("/verify/email/", name="app_verify_email")
     */
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('app_register');
    }
    /**
     * @Route("/clearsession", name="clearsession")
     */
    public function clearsession(Request $request)
    {
        $request->getSession()->clear();
        return $this->redirectToRoute('home');
    }
}
