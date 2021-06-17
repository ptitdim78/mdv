<?php

namespace App\Controller\Admin;

use App\Entity\Promo;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PromoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Promo::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description')->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex()->setFormTypeOption('allow_delete', false),
            ImageField::new('image')->setBasePath('uploads/image/')->onlyOnIndex(),
            BooleanField::new('online'),
            TextField::new('remise')->setFormTypeOption( 'empty_data', ''),
            DateField::new('createdAt')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['createdAt'=>'DESC']);
    }

}
