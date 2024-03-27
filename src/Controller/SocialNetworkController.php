<?php

namespace App\Controller;

use App\Repository\SocialNetworkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocialNetworkController extends AbstractController
{

    public function index(SocialNetworkRepository $socialNetworkRepository): Response
    {

        $socialNetworks = $socialNetworkRepository->findBy(["isActive"=>true], ['name' => 'ASC']);
        return $this->render('social_network/index.html.twig', [
            'socialNetworks' => $socialNetworks,
        ]);
    }
}
