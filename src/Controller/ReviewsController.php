<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Form\ReviewsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReviewsController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/reviews", name="reviews")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $reviews = new Reviews();
        $form = $this->createForm(ReviewsType::class, $reviews)->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->addFlash('success', 'Test réussi');
            return $this->redirectToRoute('reviews');
        }
        return $this->render('reviews/index.html.twig', [
            'form'=>$form->createView(),
        ]);
    }
}
