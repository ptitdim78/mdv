<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{

    /**
     * @Route("/products", name="products")
     * @return Response
     */
    public function index(): Response
    {
        $products = new Products();
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
            'products'=>$products
        ]);
    }
}
