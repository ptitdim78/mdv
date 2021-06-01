<?php


namespace App\Controller;


use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Votre nom'
            ])
            ->add('mail', EmailType::class, [
                'label'=>'Votre mail'
            ])
            ->add('subject', TextType::class, [
                'label'=>'Objet'
            ])
            ->add('message', TextareaType::class, [
                'label'=>'votre message'
            ])
            ->add('cookies', CheckboxType::class, [
                'label'=>'En soumettant ce formulaire, j\'accepte que les informations saisies dans ce formulaire 
                soient utilisées, exploitées, traitées pour permettre de me recontacter, pour m’envoyer la newsletter, 
                dans le cadre de la relation commerciale qui découle de cette demande de contact.'
            ]);
    }

    public function configureOptionsOp(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Contact::class,
        ]);
}
}