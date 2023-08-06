<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeaderController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function category(): Response
    {
        return $this->render('front/pages/category.html.twig', [
            'controller_name' => 'HeaderController',
        ]);
    }

    #[Route('/nft', name: 'app_nft')]
    public function nft(): Response
    {
        return $this->render('front/pages/nft.html.twig', [
            'controller_name' => 'HeaderController',
        ]);
    }


}
