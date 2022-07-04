<?php

namespace App\Controller\Admin;

use App\Entity\Measurement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MeasurementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Measurement::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
