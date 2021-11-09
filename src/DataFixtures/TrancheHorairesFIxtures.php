<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\TrancheHoraire;
	use Doctrine\Persistence\ObjectManager;
	
	class TrancheHorairesFIxtures extends \Doctrine\Bundle\FixturesBundle\Fixture
	{
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			
			for($i = 0; $i<25; ++$i){
				$heuresDebut = ++$i;
				
				for($j = 0; $j<25; ++$j){
					$heuresFin = ++$j;
					$trancheHoraire = new TrancheHoraire();
					$trancheHoraire->setDebut($heuresDebut);
					$trancheHoraire->setFin($heuresFin);
					$manager->persist($trancheHoraire);
					
				}
			}
			
			$manager->flush();
			
			
			
		}
	}