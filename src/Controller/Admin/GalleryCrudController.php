<?php

namespace App\Controller\Admin;

use App\Entity\Gallery;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class GalleryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gallery::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description')->hideOnIndex()->setFormTypeOption( 'empty_data', ''),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex()->setFormTypeOption('allow_delete', false),
            ImageField::new('image')->setBasePath('uploads/image/')->onlyOnIndex(),
            DateField::new('createdAt'),
            ChoiceField::new('domaine')->setChoices([
                'Immobilier' => 'Immobilier',
                'Signalétique' => 'Signaletique',
                'Bâche' => 'Bache',
                'Marquage' => 'Marquage',
                'Logo' => 'Logo'
            ])
        ];
    }

    public function configureCrud(Crud $crud) : Crud
    {
        return $crud->setDefaultSort(['createdAt'=>'DESC']);
    }
}
