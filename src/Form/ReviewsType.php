<?php

namespace App\Form;

use App\Entity\Reviews;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Length;

class ReviewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',  TextType::class,[
                'constraints'=> new Length([
                    'min'=>3,
                    'max'=>108,
                ]),
                'label'=>'Nom',
                'attr'=>[
                    'placeholder'=>'Saisir votre nom'
                ]
            ])
            ->add('lastname', TextType::class, [
                'constraints'=> new Length([
                    'min'=>3,
                    'max'=>108,
                ]),
                'label'=>'Prénom',
                'attr'=>[
                    'placeholder'=>'Saisir votre prénom'
                ]
            ])
            ->add('message', TextareaType::class,[
                'label'=>'Message',
                'attr'=>[
                    'placeholder'=>'Saisir votre message'
                ]
            ])
            ->add('rating', IntegerType::class,[
                'label'=>'Note'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reviews::class,
        ]);
    }
}
