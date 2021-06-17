<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reviews::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstname'),
            TextField::new('lastname')->setFormTypeOption( 'empty_data', ''),
            TextareaField::new('message')->hideOnIndex(),
            ChoiceField::new('rating')->setChoices([
                '0' => '0',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5'
            ])
        ];
    }

}
