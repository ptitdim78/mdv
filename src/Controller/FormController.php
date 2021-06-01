<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     */
    public function contact(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
//            dd($form);
            $this->addFlash('success', 'Test réussi');
            return $this->redirectToRoute('contact');
        }
        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
