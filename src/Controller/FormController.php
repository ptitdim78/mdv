<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('cabcee739b-cb55d7@inbox.mailtrap.io')
                ->subject('Demande de devis')
                ->htmlTemplate('mail/ContactMail.html.twig')
                ->context([
                    'name'=> $contact->getName(),
                    'phone'=> $contact->getPhone(),
                    'subject'=> $contact->getSubject(),
                    'message'=> $contact->getMessage()
                ]);

            $mailer->send($email);

            $this->addFlash('success', 'Test réussi');
            return $this->redirectToRoute('contact');
        }
        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
