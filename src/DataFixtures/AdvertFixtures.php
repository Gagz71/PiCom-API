<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\Advert;
	use App\Entity\HtmlAdvert;
	use App\Entity\ImgAdvert;
	use App\Repository\CustomerRepository;
	use App\Repository\TrancheHoraireRepository;
	use App\Repository\ZoneRepository;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Common\DataFixtures\DependentFixtureInterface;
	use Doctrine\Persistence\ObjectManager;
	
	class AdvertFixtures extends Fixture implements DependentFixtureInterface
	{
		private CustomerRepository  $customerRepository;
		private ZoneRepository  $zoneRepository;
		private TrancheHoraireRepository  $trancheHoraireRepository;
		
		public function __construct(CustomerRepository $customerRepository,  ZoneRepository  $zoneRepository,  TrancheHoraireRepository  $trancheHoraireRepository)
		{
			$this->customerRepository = $customerRepository;
			$this->zoneRepository = $zoneRepository;
			$this->trancheHoraireRepository = $trancheHoraireRepository;
		}
		/**
		 * @inheritDoc
		 */
		public function getDependencies()
		{
			return[
				UserFixtures::class,
				ZoneFixtures::class,
				TrancheHorairesFIxtures::class,
			];
		}
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			$customers = $this->customerRepository->findAll();
			$zones = $this->zoneRepository->findAll();
			$tranchesHoraires = $this->trancheHoraireRepository->findAll();
			
			for($i = 0; $i < 15; ++$i){
				$customerIndex = shuffle($customers);
				$zoneIndex = shuffle($zones);
				$tranchesHorairesIndex = shuffle($tranchesHoraires);
				$htmlAdvert = new HtmlAdvert();
				$htmlAdvert->setCreationDate(new \DateTime());
				$htmlAdvert->setStartDate(new \DateTime('2015-01-01'));
				$htmlAdvert->setEndDate(new \DateTime('2022-04-02'));
				$htmlAdvert->setCustomer($customers[$customerIndex]);
				$htmlAdvert->addZone($zones[$zoneIndex]);
				$htmlAdvert->addTrancheHoraire($tranchesHoraires[$tranchesHorairesIndex]);
				$htmlAdvert->setContent('Contenu d\'un article teste. Lorem ipis Lorem ipsumCountless voyages will be lost in mankinds like ionic cannons in winds ');
				$manager->persist($htmlAdvert);
				
				$imgAdvert = new ImgAdvert();
				$imgAdvert->setCreationDate(new \DateTime());
				$imgAdvert->setStartDate(new \DateTime('2015-01-01'));
				$imgAdvert->setEndDate(new \DateTime('2022-04-02'));
				$imgAdvert->setCustomer($customers[$customerIndex]);
				$imgAdvert->addZone($zones[$zoneIndex]);
				$imgAdvert->addTrancheHoraire($tranchesHoraires[$tranchesHorairesIndex]);
				$manager->persist($imgAdvert);
			}
			$manager->flush();
		}
	}