<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Commande;
use App\Form\EditUserType;
use App\Form\EditAddressType;
use App\Repository\ColorRepository;
use App\Repository\AddressRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    /**
     * @Route("/profile" , priority=10,  name="profile")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator): Response
    {
        $user = $this->getUser();
        $colors = $user->getColors();
        $commandes = $user->getCommandes();
        $paginationCommandes = $paginator->paginate(
            $commandes, /* query NOT result */
            $request->query->getInt('commande', 1), /*page number*/
            $this->getParameter('app.numPerList'), /*limit per page*/
            ["pageParameterName" => "commande"]
        );
        $form = $this->createForm(EditUserType::class, $user);
        $form->handleRequest($request);
        $formAddress = $this->createForm(EditAddressType::class, $user);
        $formAddress->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('profile');
        }
        if ($formAddress->isSubmitted() && $formAddress->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('profile');
        }
        return $this->render('user/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'formAddress' => $formAddress->createView(),
            'commandes' => $paginationCommandes,
        ]);
    }

    /**
     * @Route("/profile/commandes/{id}", name="commande_detail")
     */
    public function commandeDetail(Commande $commande): Response
    {
        return $this->render('user/commande_detail.html.twig', [
            'commande' => $commande,
        ]);
    }

    /**
     * @Route("/addcolor", priority=10, methods={"POST"})
     */
    public function addcolor(Request $request, ColorRepository $colorRepository, EntityManagerInterface $entityManager):Response
    {
        $colorId = $request->request->get("id");
        $color = $colorRepository->find($colorId);                                  
        $user = $this->getUser();
        $user->addColor($color);
        $entityManager->persist($user);
        $entityManager->flush();
        //
        return new Response("ok");
    }
    /**
     * @Route("/removecolor", priority=10, methods={"POST"})
     */
    public function removecolor(Request $request, ColorRepository $colorRepository, EntityManagerInterface $entityManager):Response
    {
        $colorId = $request->request->get("id");
        $color = $colorRepository->find($colorId);                                  
        $user = $this->getUser();
        $user->removeColor($color);
        $entityManager->persist($user);
        $entityManager->flush();
        //
        return new Response("ok");
    }
    

    /**
     * @Route("/delete-address", priority=10, methods={"POST"})
     */
    public function deleteAddress(Request $request,AddressRepository $addressRepository, EntityManagerInterface $entityManager):Response
    {
        $address_id = $request->request->get("id");
        $address = $addressRepository->find($address_id);
        $user = $this->getUser();
        $user->removeAddress($address);
        $entityManager->remove($address);
        $entityManager->persist($user);
        $entityManager->flush();
        
        return new Response("ok");
    }

}
