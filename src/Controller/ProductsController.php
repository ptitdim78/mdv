<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function index(Request $request): Response
    {
        $products = new Products();
        $form = $this->createForm(ProductsType::class, $products)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->addFlash('success', 'Votre produit a bien été ajouté');
            return $this->redirectToRoute('products');
        }
        return $this->render('products/index.html.twig', [
            'form'=>$form->createView(),
            'products'=>$products,
        ]);
    }
}
