<?php

namespace App\Controller\Admin;

use App\Entity\ProductsClothes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ProductsClothesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProductsClothes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description')->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex()->setFormTypeOption('allow_delete', false),
            ImageField::new('image')->setBasePath('uploads/image/')->onlyOnIndex(),
            TextField::new('poids')->hideOnIndex(),
            TextField::new('composition')->hideOnIndex(),
            TextField::new('poids_carton')->hideOnIndex(),
            TextField::new('dimension_colis')->hideOnIndex(),
            TextareaField::new('infos')->hideOnIndex(),
            TextField::new('lien')->hideOnIndex(),
            BooleanField::new('online'),
            DateField::new('updatedAt'),
        ];
    }

    public function configureCrud(Crud $crud) : Crud
    {
        return $crud->setDefaultSort(['updatedAt'=>'DESC']);
    }

}
