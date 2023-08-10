<?php

namespace App\Controller;

use App\Repository\NftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private NftRepository $nftRepository,
    ) {
    }

    #[Route('/', name: 'app_home')]
    public function index(NftRepository $nftRepository): Response
    {
        $nfts = $nftRepository->findAll();
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'nfts' => $nfts,
        ]);
    }
}
