<?php

namespace App\Controller;

use App\Entity\FloorPrice;
use App\Entity\Price;
use App\Form\PriceType;
use App\Repository\FloorPriceRepository;
use App\Repository\PriceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin/price")
 */
class AdminPriceController extends AbstractController
{
    /**
     * @Route("/paint", name="app_admin_price_paint_index", methods={"GET"})
     */
    public function indexPaint(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $prices = $entityManager->getRepository(Price::class)->findBy(["articleType"=>"paint"], ["id"=>"DESC"]);
        // Pagination
        $pagination = $paginator->paginate(
            $prices , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
        return $this->render('admin_price/index.html.twig', [
            'prices' => $pagination,
            'articleType' => 'paint',
        ]);
    }

    /**
     * @Route("/floor", name="app_admin_price_floor_index", methods={"GET"})
     */
    public function indexFloor(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request, FloorPriceRepository $floorPrice): Response
    {
        $prices = $floorPrice->findAll();
        // Pagination
        $pagination = $paginator->paginate(
            $prices , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
        return $this->render('admin_price/index.html.twig', [
            'prices' => $pagination,
            'articleType' => 'floor',
        ]);
    }

        /**
     * @Route("/wall", name="app_admin_price_wall_index", methods={"GET"})
     */
    public function indexWall(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $prices = $entityManager->getRepository(Price::class)->findBy(["articleType"=>"wall"]);
        // Pagination
        $pagination = $paginator->paginate(
            $prices , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
        return $this->render('admin_price/index.html.twig', [
            'prices' => $pagination,
            'articleType' => 'wall',
        ]);
    }

    /**
     * @Route("/new/{articleType}", name="app_admin_price_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $articleType= $request->get('articleType');
        $price = new Price();
        $form = $this->createForm(PriceType::class, $price, ['articleType'=>$articleType]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            switch($price->getArticleType()){
                case "paint":
                    if($price->getMesure()=="mL"){
                        $price->setLitre($price->getQuantity()/1000);
                    }
                    break;
                case "floor":
                    $price->setArticleType("floor");
                    break;
                case "wall":
                    $price->setArticleType("wall");
                    break;
            }
            $entityManager->persist($price);
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.priceAddSuccess"));
            return $this->redirectToRoute('app_admin_price_'.$articleType.'_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_price/new.html.twig', [
            'price' => $price,
            'form' => $form,
            'articleType' => $articleType,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_price_show", methods={"GET"})
     */
    public function show(Price $price): Response
    {
        return $this->render('admin_price/show.html.twig', [
            'price' => $price,
        ]);
    }

    /**
     * @Route("/{id}/edit/{articleType}", name="app_admin_price_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Price $price, EntityManagerInterface $entityManager, TranslatorInterface $translatorInterface): Response
    {
        $articleType= $request->get('articleType');
        $form = $this->createForm(PriceType::class, $price, ['articleType'=>$articleType]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            switch($price->getArticleType()){
                case "paint":
                    if($price->getMesure()=="mL"){
                        $price->setLitre($price->getQuantity()/1000);
                    }
                    break;
                case "floor":
                    $price->setArticleType("floor");
                    break;
                case "wall":
                    $price->setArticleType("wall");
                    break;
            }
            //
            $entityManager->flush();
            // Message flash
            $this->addFLash('success', $translatorInterface->trans("back.message.priceEditSuccess"));
            return $this->redirectToRoute('app_admin_price_'.$articleType.'_index', [], Response::HTTP_SEE_OTHER);
        }
        //
        return $this->renderForm('admin_price/edit.html.twig', [
            'price' => $price,
            'form' => $form,
            'articleType' => $articleType,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_price_delete", methods={"POST"})
     */
    public function delete(Request $request, Price $price, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$price->getId(), $request->request->get('_token'))) {
            $entityManager->remove($price);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_price_index', [], Response::HTTP_SEE_OTHER);
    }
}
