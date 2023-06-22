<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Name'),
            SlugField::new('slug')->setTargetFieldName('Name'),
            ImageField::new('image')
            ->setBasePath('uploads/')
            ->setUploadDir('public/uploads/')
            ->setRequired(false),
            NumberField::new('Year'),
            ChoiceField::new('energy')
            ->setChoices([
                'Essence' => 'Essence',
                'Diesel' => 'Diesel',
                'Hybride' => 'Hybride',
                'Electrique' => 'Electrique',
            ]),
            ChoiceField::new('type')
            ->setChoices([
                'Manual' => 'Manuel',
                'Automatic' => 'Automatique',
            ]),
            NumberField::new('Km'),
            MoneyField::new('Prices')->setCurrency('EUR'),
            ChoiceField::new('accesory')
            ->setChoices([
                'Climatisation' => 'Climatisation',
                'GPS' => 'GPS',
                'Pilote automatique' => 'Pilote automatique',
                'Radar de recul' => 'Radar de recul',
                'Régulateur de vitesse' => 'Régulateur de vitesse',
                'Sièges chauffants' => 'Sièges chauffants',
                'Toit ouvrant' => 'Toit ouvrant',
                'Vitres teintées' => 'Vitres teintées',
                'Volant multifonctions' => 'Volant multifonctions',
                'Volant en cuir' => 'Volant en cuir',
                'Bluetooth' => 'Bluetooth',
                'USB' => 'USB',
                'MP3' => 'MP3',
                'CD' => 'CD',
                'Radio' => 'Radio',
                'ABS' => 'ABS',
                'Airbag' => 'Airbag',
                'ESP' => 'ESP',
                'Phares au xénon' => 'Phares au xénon',
            ])->allowMultipleChoices()
            ->setRequired(false),
            BooleanField::new('Actif'),
        ];
    }
}
