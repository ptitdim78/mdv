<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/products", name="products", methods={"GET|POST"})
     * @param Request $request
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function index(Request $request, SluggerInterface $slugger, FileUploader $fileUploader): Response
    {
        $products = new Products();

        $form = $this->createForm(ProductsType::class, $products);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($products);
            $em->flush();

            $this->addFlash('success', 'Votre produit a bien été ajouté');
            return $this->redirectToRoute('products');
            }

        return $this->render('products/index.html.twig', [
            'form'=>$form->createView(),
            'products' => $products,
            'controller_name' => 'ProductsController',
        ]);
    }
}
