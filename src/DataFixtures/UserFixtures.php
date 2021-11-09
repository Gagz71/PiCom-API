<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\Admin;
	use App\Entity\Customer;
	use App\Repository\CreditCardRepository;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Common\DataFixtures\DependentFixtureInterface;
	use Doctrine\Persistence\ObjectManager;
	use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
	
	class UserFixtures extends Fixture implements DependentFixtureInterface
	{
		private CreditCardRepository  $creditCardRepository;
		private UserPasswordHasherInterface $hasher;
		
		public function __construct(UserPasswordHasherInterface $hasher, CreditCardRepository  $creditCardRepository)
		{
			$this->hasher = $hasher;
			$this->creditCardRepository = $creditCardRepository;
		}
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			$creditCards = $this->creditCardRepository->findAll();
			
			$admin = new Admin();
			$pwd = $this->hasher->hashPassword($admin, '12345');
			$admin->setFirstName('admin');
			$admin->setLastName('admin');
			$admin->setEmail("admin@admin.com");
			$admin->setPassword($pwd);
			
			
			
			$lastnames=[
				'De Galles',
				'De Vannes',
				'Pandragon',
				'Ackermann',
				'Benz'
			];
			$firstnames=[
				'Perceval',
				'Karadoc',
				'Arthur',
				'Mikasa',
				'Martha'
			];
			
			foreach($lastnames as $key0 => $lastname ){
				foreach($firstnames as $key => $firstname){
					$creditCardIndex = shuffle($creditCards);
					$customer = new Customer();
					$customer->setLastName($lastname);
					$customer->setFirstname($firstname);
					$customer->setEmail($lastname.'.'.$firstname.'@hb.fr');
					$pwd = $this->hasher->hashPassword($customer, '12345');
					$customer->setPassword($pwd);
					$customer->setPhone('0606060606');
					$customer->addCreditCard($creditCards[$creditCardIndex]);
					$manager->persist($customer);
				}
				$manager->persist($admin);
				
			}
			
			
			
			
			$manager->flush();
		}
		
		public function getDependencies()
		{
			return [
				CreditCardsFixtures::class
			];
		}
	}