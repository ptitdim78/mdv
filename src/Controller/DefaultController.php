<?php

namespace App\Controller;

use App\Entity\Reviews;
use App\Repository\ReviewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use http\Env\Request;
use http\Message;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="default")
     * @return Response
     */

    public function index(): Response
    {

        $listReviews = $this->getDoctrine()->getRepository(Reviews::class)->findAll();

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController', 'toutesLesReviews' => $listReviews,
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
