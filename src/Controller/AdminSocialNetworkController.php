<?php

namespace App\Controller;

use App\Entity\SocialNetwork;
use App\Form\SocialNetworkType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\SocialNetworkRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/social/network")
 */
class AdminSocialNetworkController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_social_network_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $socialNetworks = $entityManager
            ->getRepository(SocialNetwork::class)
            ->findAll();

        return $this->render('admin_social_network/index.html.twig', [
            'social_networks' => $socialNetworks,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_social_network_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $socialNetwork = new SocialNetwork();
        $form = $this->createForm(SocialNetworkType::class, $socialNetwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($socialNetwork);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_social_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_social_network/new.html.twig', [
            'social_network' => $socialNetwork,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_social_network_show", methods={"GET"})
     */
    public function show(SocialNetwork $socialNetwork): Response
    {
        return $this->render('admin_social_network/show.html.twig', [
            'social_network' => $socialNetwork,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_social_network_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SocialNetwork $socialNetwork, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SocialNetworkType::class, $socialNetwork);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_social_network_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_social_network/edit.html.twig', [
            'social_network' => $socialNetwork,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_social_network_delete", methods={"POST"})
     */
    public function delete(Request $request, SocialNetwork $socialNetwork, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socialNetwork->getId(), $request->request->get('_token'))) {
            $entityManager->remove($socialNetwork);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_social_network_index', [], Response::HTTP_SEE_OTHER);
    }
}
