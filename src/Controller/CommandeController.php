<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\Commande;
use App\Form\CommandeType;
use App\Entity\ArticleCommande;
use App\Form\AddressType;
use App\Repository\AddressRepository;
use App\Repository\DeliveryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CommandeController extends AbstractController
{
    /**
     * @Route("/commande/show", name="app_commande_show")
     */
    public function showCommande(Request $request, EntityManagerInterface $entityManager, AddressRepository $addressRepository, DeliveryRepository $deliveryRepository): Response
    {

        $uniqueId = '';
        for($i = 0; $i < 5; $i++){
            $uniqueId .= mt_rand(0,9);
        }
        $uniqueId .= date('YmdHis');
        $uniqueId .= $this->getUser()->getId();
        $commande = new Commande();
        $livraison= null;
        $facturation= null;
        $deliveries = null;
        $delivery = null;

 
        $addresses = $addressRepository->findBy(["user" => $this->getUser()], ["name" => "ASC"]);
        if ($addresses != null && count($addresses) > 0) {
            $livraison = $addresses[0];
            $facturation = $addresses[0];
            if($request->request->all() != null){
                $livraison = $addressRepository->find($request->request->get('adresseLivraison'));
                $facturation = $addressRepository->find($request->request->get('adresseFacturation'));
            }
            $deliveries = $deliveryRepository->findBy(["country" => $livraison->getCountry()]);
            if ($deliveries != null && count($deliveries) > 0) {
                $delivery = $deliveries[0];
                if($request->request->all() != null){
                    $deliv = $deliveryRepository->find($request->request->get('delivery'));
                    if(in_array($deliv, $deliveries)){
                        $delivery = $deliv;
                    }
                }
            }
        }
        $total = 0;
        foreach ($this->getUser()->getPanier()->getArticles() as $article) {
            switch ($article->getType()) {
                case "color":
                    $total += $article->getActualPrice()->getPrice() * $article->getQuantity();

                    break;
                case "goodies":
                    $total += $article->getGoodie()->getPrice() * $article->getQuantity();
                    break;
            }
        }
        $form = $this->createForm(CommandeType::class, $commande, ["addresses" => $addresses, "deliveries" => $deliveries, 'livraison' => $livraison, 'facturation' => $facturation, 'delivery' => $delivery]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            foreach($this->getUser()->getPanier()->getArticles() as $article) {
                $articleCommande = new ArticleCommande();
                $articleCommande->setGoodie($article->getGoodie());
                $articleCommande->setColor($article->getColor());
                $articleCommande->setFinish($article->getFinish());
                $articleCommande->setQuantity($article->getQuantity());
                $articleCommande->setMeters($article->getMeters());
                $articleCommande->setType($article->getType());
                switch($article->getType()) {
                    case "color":
                        $articleCommande->setPrice($article->getActualPrice()->getPrice());
                        $articleCommande->setLiter($article->getActualPrice()->getLitre());

                        break;
                    case "goodies":
                        $articleCommande->setPrice($article->getGoodie()->getPrice());
                        break;
                }
                $entityManager->persist($articleCommande);
                $commande->addArticle($articleCommande);
                $entityManager->remove($article);
            }
            $commande->setUser($this->getUser());
            $commande->setCreatedAt(new \DateTimeImmutable('now'));
            $commande->setTotalPrice($total);
            $commande->setNumCommande($uniqueId);
            $entityManager->persist($commande);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->renderForm('commande/index.html.twig', [
            'form' => $form,
            'livraison' => $livraison,
            'facturation' => $facturation,
            'addresses' => $addresses,
            'total' => $total,
            'delivery' => $delivery,
            'deliveries' => $deliveries
        ]);
    }

    /**
     * @Route("/commande/edit/address/{id}", name="app_edit_address")
     */
    public function changeAddress(Address $address ,Request $request, EntityManagerInterface $entityManager, AddressRepository $addressRepository): Response
    {
        // $id = $request->request->get('id');
        // $address = $addressRepository->find($id);
        $formAddress = $this->createForm(AddressType::class, $address, [
            'action' => $this->generateUrl('app_ajx_address', ['id' => $address->getId()]),
            'method' => 'POST',
            'attr' => ['id' => 'formAddress']
        ]);
        // $formAddress->handleRequest($request);
        // // dd($formAddress, $formAddress->isSubmitted(), $formAddress->isValid());
        // if ($formAddress->isSubmitted() && $formAddress->isValid()) {
        //     $entityManager->persist($address);
        //     $entityManager->flush();
        //     return $this->redirectToRoute('app_commande_show', [
        //         'adresseLivraison' => $request->request->get('adresseLivraison'),
        //         'adresseLivraison' => $request->request->get('adresseFacturation'),
        //         ]);
        // }
        return $this->renderForm('commande/editAddress.html.twig', [
            'formAddress' => $formAddress,
        ]);

    }

    /**
     * @Route("/commande/ajax/address/{id}", name="app_ajx_address")
     */
    public function ajaxAddress(Address $address, Request $request, EntityManagerInterface $entityManager, AddressRepository $addressRepository): Response
    {
        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $entityManager->persist($address);
            $entityManager->flush();
            return new JsonResponse(['id' => $address->getId()]);
        }
    }



}
