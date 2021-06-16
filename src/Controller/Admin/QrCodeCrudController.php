<?php

namespace App\Controller\Admin;

use App\Entity\QrCode;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class QrCodeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return QrCode::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('imageFile')->setFormType(VichImageType::class)->hideOnIndex()->setFormTypeOption('allow_delete', false),
            ImageField::new('image')->setBasePath('uploads/image/')->onlyOnIndex(),
        ];
    }

}
