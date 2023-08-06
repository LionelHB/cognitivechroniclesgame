<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ours', name: 'app_')]
class FooterController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('front/pages/aboutus.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }

    #[Route('/partnairs', name: 'partnairs')]
    public function partnairs(): Response
    {
        return $this->render('front/pages/partnairs.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }
    #[Route('/mention_l_égale', name: 'disclaimer')]
    public function disclaimer(): Response
    {
        return $this->render('front/pages/disclaimer.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }
    #[Route('/dmca', name: 'dmca')]
    public function dmca(): Response
    {
        return $this->render('front/pages/dmca.html.twig', [
            'controller_name' => 'FooterController',
        ]);
    }
}
