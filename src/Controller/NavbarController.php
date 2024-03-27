<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryTranslationRepository;
use App\Repository\SubCategoryTranslationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class NavbarController extends AbstractController
{
    /**
     * @Route("/navbar", name="app_navbar", priority=10)
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findBy(['isMenu'=>true], ['rankOrder' => 'ASC']);
        return $this->render('navbar/index.html.twig', [
            'categories' => $categories,

        ]);
    }
}
