<?php

namespace App\Controller\Admin;

use App\Entity\CreditCard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CreditCardCrudController extends AbstractCrudController
{
	public static function getEntityFqcn(): string
	{
	  return CreditCard::class;
	}

    
	public function configureFields(string $pageName): iterable
	{
		return [
			IdField::new('id')->hideOnForm(),
			TextField::new('cardNumbers', 'N°de carte'),
			TextField::new('expirationYear', 'Année d\'expiration'),
			TextField::new('expirationMonth', 'Mois d\'expiration'),
			TextField::new('cryptogram', 'CVV'),
			
		];
	}
    
}
