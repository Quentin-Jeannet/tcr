<?php

namespace App\Controller;

use App\Entity\FloorPriceLength;
use App\Form\FloorPriceLengthType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\FloorPriceLengthRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/admin/floor-price-length")
 */
class AdminFloorPriceLengthController extends AbstractController
{
    /**
     * @Route("/", name="app_admin_floor_price_length_index", methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $floorPriceLengths = $entityManager
            ->getRepository(FloorPriceLength::class)
            ->findBy([], ['length' => 'ASC']);

        return $this->render('admin_floor_price_length/index.html.twig', [
            'floor_price_lengths' => $floorPriceLengths,
        ]);
    }

    /**
     * @Route("/new", name="app_admin_floor_price_length_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $floorPriceLength = new FloorPriceLength();
        $form = $this->createForm(FloorPriceLengthType::class, $floorPriceLength);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($floorPriceLength);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_price_length_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_price_length/new.html.twig', [
            'floor_price_length' => $floorPriceLength,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_price_length_show", methods={"GET"})
     */
    public function show(FloorPriceLength $floorPriceLength): Response
    {
        return $this->render('admin_floor_price_length/show.html.twig', [
            'floor_price_length' => $floorPriceLength,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_admin_floor_price_length_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, FloorPriceLength $floorPriceLength, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FloorPriceLengthType::class, $floorPriceLength);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_floor_price_length_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_floor_price_length/edit.html.twig', [
            'floor_price_length' => $floorPriceLength,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_admin_floor_price_length_delete", methods={"POST"})
     */
    public function delete(Request $request, FloorPriceLength $floorPriceLength, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$floorPriceLength->getId(), $request->request->get('_token'))) {
            $entityManager->remove($floorPriceLength);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_floor_price_length_index', [], Response::HTTP_SEE_OTHER);
    }
}
