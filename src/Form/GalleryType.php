<?php

namespace App\Form;

use App\Entity\Gallery;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GalleryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domaine', TextType::class, [
                'choices'=> [
                    'Immobiler'=>1,
                    'Signalétique'=>2,
                    'Bâche'=>3,
                    'Marquages'=>4,
                    'Logo'=>5
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=>Gallery::class
        ]);
    }
}
