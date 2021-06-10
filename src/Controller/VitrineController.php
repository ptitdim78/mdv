<?php

namespace App\Controller;

use App\Entity\CoupDeCoeur;
use App\Entity\FinDeSerie;
use App\Entity\Promo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VitrineController extends AbstractController
{
    /**
     * @Route("/vitrine", name="vitrine")
     */
    public function index(): Response
    {
        $finDeSerie= $this->getDoctrine()->getRepository(FinDeSerie::class)->findAll();
        $promo= $this->getDoctrine()->getRepository(Promo::class)->findAll();
        $coupDeCoeur= $this->getDoctrine()->getRepository(CoupDeCoeur::class)->findAll();

        return $this->render('vitrine/index.html.twig', [
            'FinDeSerie'=> $finDeSerie,
            'Promo'=> $promo,
            'CoupDeCoeur'=>$coupDeCoeur,
            'controller_name' => 'VitrineController',
        ]);
    }
}
