<?php

namespace App\Controller;

use App\Repository\FloorPriceRepository;
use App\Repository\FloorFamilyRepository;
use App\Repository\FloorPriceRenderRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontFloorController extends AbstractController
{
    /**
     * Fonction qui récupère les renders disponibles pour une famille de sol
     */
    public function getFamilyPriceRender($id, FloorPriceRepository $floorPriceRepository):Response
    {
        $prices = $floorPriceRepository->findPriceRenderDistinctInFamily($id);
        return $this->render('pages/_floorRenderSelect.html.twig', [
            'prices' => $prices,
        ]);
    }
    /**
     * fonction qui récupère les epaisseurs disponibles pour une famille de sol
     */
    public function getFamilyPriceThickness($id, FloorPriceRepository $floorPriceRepository):Response
    {
        $prices = $floorPriceRepository->findPriceThicknessDistinctInFamily($id);
        return $this->render('pages/_floorThicknessSelect.html.twig', [
            'prices' => $prices,
        ]);
    }
    /**
     * @route("/floor/getTickness", name="get_floor_thickness")
     */
    public function getThicknessFromAjax(Request $request, FloorPriceRepository $floorPriceRepository):JsonResponse
    {
        $id = $request->request->get('id');
        $familyId = $request->request->get('familyId');
        $allPrices = $floorPriceRepository->findPriceByFamilyAndRender($id, $familyId);
        $prices = [];
        foreach ($allPrices as $price) {
            $tab = [
                'id' => $price->getFloorThickness()->getId(),
                'thickness' => $price->getFloorThickness()->getThickness(),
                'price' => $price->getPrice(),
            ];
            $prices[] = $tab;
        }
        // return new JsonResponse($thicknesses);
        return new JsonResponse($prices);
    }
}
