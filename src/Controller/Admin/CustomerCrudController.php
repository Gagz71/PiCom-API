<?php

namespace App\Controller\Admin;

use App\Entity\Customer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CustomerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Customer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
	        IdField::new('id')->hideOnForm(),
	        TextField::new('lastname', 'Nom'),
	        TextField::new('firstname', 'Prénom'),
	        EmailField::new('email', 'Email'),
	        TextField::new('plainPassword', 'Mot de passe (personnel)')->hideOnIndex(),
		TelephoneField::new('phone', 'téléphone')
        ];
    }
    
}
