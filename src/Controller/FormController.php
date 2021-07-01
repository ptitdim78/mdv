<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\QrCode;
use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $QrCode = $this->getDoctrine()->getRepository(QrCode::class)->findAll();
        $form = $this->createForm(ContactType::class, $contact)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $email = (new TemplatedEmail())
                ->from($contact->getMail())
                ->to('contact@lemoutondesvilles.fr')
                ->subject('demande de devis')
                ->htmlTemplate('mail/ContactMail.html.twig')
                ->context([
                    'firstname'=>$contact->getFirstname(),
                    'lastname'=>$contact->getLastname(),
                    'phone'=>$contact->getPhone(),
                    'subject'=>$contact->getSubject(),
                    'message'=>$contact->getMessage(),
                ]);

            $mailer->send($email);


            $this->addFlash('success', 'Email envoyé');
            return $this->redirectToRoute('contact');
        }
        return $this->render('form/contact.html.twig', [
            'form' => $form->createView(),
            'QrCode'=> $QrCode
        ]);
    }
}
