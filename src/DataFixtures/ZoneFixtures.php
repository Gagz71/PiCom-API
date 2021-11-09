<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\Zone;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Persistence\ObjectManager;
	
	class ZoneFixtures extends Fixture
	{
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			$zoneNames = [
				'Nord',
				'Est',
				'Sud',
				'Ouest'
			];
			
			foreach ($zoneNames as $zoneName){
				$zone = new Zone($zoneName);
				$manager->persist($zone);
			}
			$manager->flush();
		}
	}