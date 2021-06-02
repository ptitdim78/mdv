<?php


namespace App\Controller;


use App\Entity\Contact;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre nom'
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Votre mail'
            ])
            ->add('subject', TextType::class, [
                'label' => 'Objet'
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message'
            ])
            ->add('cookies', CheckboxType::class, [
                'label' => 'En soumettant ce formulaire, j\'accepte que les informations saisies dans ce formulaire soit utilisées, exploitées, traitées pour permettre de me recontacter, pour m\'envoyer la newsletter, dans le cadre de la relation commerciale qui découle de cette demande de contact.'
            ])
            ->add('phone', TextType::class,[
                'label'=>'Téléphone'
            ])
            ->add('lastname', TextType::class,[
                'label' => 'Votre prénom'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}