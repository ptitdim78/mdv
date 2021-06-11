<?php

namespace App\Controller\Admin;

use App\Entity\CoupDeCoeur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CoupDeCoeurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoupDeCoeur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description')->hideOnIndex(),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('uploads/image/')->onlyOnIndex(),
            BooleanField::new('online'),
            TextField::new('remise'),
            DateField::new('createdAt')
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setDefaultSort(['createdAt'=>'DESC']);
    }

}
