<?php

namespace App\Controller\Admin;

use App\Entity\MeasurementType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MeasurementTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MeasurementType::class;
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
