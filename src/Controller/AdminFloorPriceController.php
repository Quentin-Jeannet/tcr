<?php

namespace App\Controller;

use App\Entity\FloorPrice;
use App\Form\FloorPriceType;
use App\Repository\FloorPriceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FloorFamilyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/floor-price")
 */
class AdminFloorPriceController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_floor_price_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $floorPrices = $entityManager
            ->getRepository(FloorPrice::class)
            ->findAll();
        // Pagination
            $paginator = $paginator->paginate(
            $floorPrices , /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            $this->getParameter('app.numPerList') /*limit per page*/
        );
        return $this->render('admin_floor_price/index.html.twig', [
            'floor_prices' => $paginator,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_floor_price_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $floorPrice = new FloorPrice();
        $form = $this->createForm(FloorPriceType::class, $floorPrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($floorPrice);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_price_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_price/new.html.twig', [
            'floor_price' => $floorPrice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_price_show", methods={"GET"})
     */
    public function show(FloorPrice $floorPrice): Response
    {
        return $this->render('admin_floor_price/show.html.twig', [
            'floor_price' => $floorPrice,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_floor_price_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FloorPrice $floorPrice, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FloorPriceType::class, $floorPrice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_price_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_price/edit.html.twig', [
            'floor_price' => $floorPrice,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_price_delete", methods={"POST"})
     */
    public function delete(Request $request, FloorPrice $floorPrice, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$floorPrice->getId(), $request->request->get('_token'))) {
            $entityManager->remove($floorPrice);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_floor_price_index', [], Response::HTTP_SEE_OTHER);
    }
}
