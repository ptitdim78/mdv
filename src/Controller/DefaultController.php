<?php

namespace App\Controller;

use App\Entity\Reviews;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @param Reviews $reviews
     * @return Response
     */
    public function index(Reviews $reviews): Response
    {
        $listeReviews = $reviews->getDoctrine()->getRepository(Reviews::class)->findAll();
        foreach ($listeReviews as $reviews){
            return $reviews->getMessage();
        }

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route ("/a_propos", name="a_propos")
     */
    public function aPropos(): Response
    {
        return $this->render('default/a_propos.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route ("/mentions_legales", name="mentions_legales")
     */
    public function contact(): Response
    {
        return $this->render('default/mentions_legales.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}
