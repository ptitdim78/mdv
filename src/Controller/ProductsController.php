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

class ProductsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/products", name="products")
     * @param FileUploader $fileUploader,
     */
    public function index(Request $request, FileUploader $fileUploader): Response
    {
        $products = new Products();
        $form = $this->createForm(ProductsType::class, $products)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            /**@var UploadedFile $productFile*/
            $productFile = $form->get('image')->getData();

            if($productFile){
                $productFileName = $fileUploader->upload($productFile);
                $products->setImage($productFileName);
            }
            $this->em->persist($products);
            $this->em->flush();


            $this->addFlash('success', 'Votre produit a bien été ajouté');
            return $this-$this->redirectToRoute('products');
        }


        return $this->render('products/index.html.twig', [
            'form'=>$form->createView(),
            'products' => $products,
            'controller_name' => 'ProductsController',
        ]);
    }
}
