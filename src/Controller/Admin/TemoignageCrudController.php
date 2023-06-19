<?php

namespace App\Controller\Admin;

use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;




class TemoignageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Temoignage::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextareaField::new('temoignage'),
            ChoiceField::new('image')
                ->setChoices([
                    'image_Alexia' => './img/Alexia.jpg',
                    'image_John' => './img/John.jpg',
                    'image_Sophie' => './img/Sophie.jpg',
                ]),
            BooleanField::new('status')
            ->setHelp('Si le témoignage est validé, il sera affiché sur la page d\'accueil')
        ];
    }
}