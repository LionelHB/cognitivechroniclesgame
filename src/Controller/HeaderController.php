<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\SubCategory;
use App\Repository\CategoryRepository;
use App\Repository\SubCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeaderController extends AbstractController
{


    public function __construct(
        private CategoryRepository $CategoryRepository,
    ) {
    }

    #[Route('/category', name: 'app_category')]
    public function category(CategoryRepository $categoryRepository, SubCategoryRepository $subCategoryRepository): Response
    {

        $subCategory1 = $categoryRepository->find(1);
        $subCategories = $subCategory1->getSubCategories();
        $subCategory2 = $categoryRepository->find(2);
        $subCategories = $subCategory2->getSubCategories();
        $subCategory3 = $categoryRepository->find(3);
        $subCategories = $subCategory3->getSubCategories();

        $category1 = $categoryRepository->find(1);
        $category2 = $categoryRepository->find(2);
        $category3 = $categoryRepository->find(3);
        

        return $this->render('front/pages/category.html.twig', [
            'controller_name' => 'HeaderController',
            'category1' => $category1,
            'category2' => $category2,
            'category3' => $category3,
            'subCategories' => $subCategories,
            'subCategory1' => $subCategory1,
            'subCategory2' => $subCategory2,
            'subCategory3' => $subCategory3,

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
