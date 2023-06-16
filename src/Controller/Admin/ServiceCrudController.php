<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }
    

    public function configureFields(string $pageName): iterable
    {

    return [
        ChoiceField::new('type')
            ->setChoices([
                'Nettoyage' => 'Nettoyage',
                'Réparation' => 'Réparation',
                'Contrôle' => 'Contrôle',
            ]),
        TextField::new('service'),
    ];
    }


}
