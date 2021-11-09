<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\CreditCard;
	use App\Repository\CustomerRepository;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Persistence\ObjectManager;
	
	class CreditCardsFixtures extends Fixture
	{
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			
			//Fixtures CreditCard
			$cardNumbers = [
				'5455634771076937',
				'5397237858238569',
				'4819499406355997',
				'4191297487611553',
				'4546422037535480',
				'5465653721194986',
				'5400645663121066',
				'345702611565180',
				'343817429286787',
				'341559242755893'
			];
			$expirationMonths = [
				'01',
				'02',
				'03',
				'04',
				'05',
				'06',
				'07',
				'08',
				'09',
				'10',
				'11',
				'12'
			];
			$cryptos = [
				'448',
				'755',
				'618',
				'163',
				'544',
				'569',
				'457',
				'987',
				'874',
				'852'
			];
			
			foreach($cardNumbers as $cardNumber){
				$creditCard = new CreditCard();
				$creditCard->setCardNumbers($cardNumber);
				$creditCard->setExpirationMonth(array_pop($expirationMonths));
				$creditCard->setExpirationYear('2024');
				$creditCard->setCryptogram(array_pop($cryptos));
				$manager->persist($creditCard);
			}
			$manager->flush();
		}
		
		
	}