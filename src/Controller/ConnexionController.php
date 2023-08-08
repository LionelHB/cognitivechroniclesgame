<?php

namespace App\Controller;

use App\Form\UserLoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    #[Route('/connexion', name: 'app_connexion')]
    public function connexion(Request $request): Response
    {
        $form = $this->createForm(UserLoginFormType::class);
        $form->handleRequest($request);

        return $this->render('front/pages/connexion.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    // #[Route('partenaires', name: 'app_partnair')]
}
