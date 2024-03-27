<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("/admin/user")
 */
class AdminUserController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_user_index", methods={"GET", "POST"})
     */
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $search = $request->request->get('search');
        //
        if(is_null($search)){
            $users = $entityManager->getRepository(User::class)->findAll();
        }else{
            $users = $entityManager->getRepository(User::class)->search($search);
        }

        return $this->render('admin_user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_user_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface,  UserPasswordHasherInterface $userPasswordHasherInterface): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mot de passe
            $user->setPassword($userPasswordHasherInterface->hashPassword($user, $form->get("plainPassword")->getData()));
            // Role
            if($user->getPlainRole()=="Superadmin"){
                $user->setRoles(["ROLE_USER", "ROLE_ADMIN", "ROLE_SUPERADMIN"]);
            }elseif($user->getPlainRole()=="Administrateur"){
                $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
            }else{
                $user->setRoles(["ROLE_USER"]);
            }
            // Is verified
            $user->isVerified(true);
            //
            $entityManager->persist($user);
            $entityManager->flush();
            // Message
            $this->addFlash("success", $translatorInterface->trans('back.message.userAddSuccess'));
            // Render
            return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('admin_user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_user_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $form = $this->createForm(UserType::class, $user, ["edition"=>true, "role"=>$user->getRoles()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            // Message
            $this->addFlash("success", $translatorInterface->trans('back.message.userEditSuccess'));
            return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_user_delete", methods={"POST"})
     */
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
            // Message
            $this->addFlash("success", $translatorInterface->trans('back.message.userDeleteSuccess'));
        }

        return $this->redirectToRoute('app_admin_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
