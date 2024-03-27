<?php

namespace App\Controller;

use App\Repository\FloorPatternRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    /**
     * @Route("/get-pattern", name="get_pattern", methods={"POST"})
     */
    public function index(FloorPatternRepository $floorPatternRepository, Request $request): Response
    {
        // Récupération de l'id du pattern
        $patternId = $request->request->get('patternId');
        // Récupération du pattern
        $pattern = $floorPatternRepository->find($patternId);
        // dd($pattern);
        //mise en tableau des données du pattern qui nous interesse
        $array = [
            "id" => $pattern->getId(),
            "name" => $pattern->getDisplayName(),
            "image" => $pattern->getImageName(),
            "description" => $pattern->getCurrentTranslation()->getDescription(),
        ];
        // dd($pattern);
        //
        return new JsonResponse($array);
    }
}
