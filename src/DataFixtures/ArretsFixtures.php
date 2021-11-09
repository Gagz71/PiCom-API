<?php
	
	namespace App\DataFixtures;
	
	use App\Entity\Arret;
	use App\Entity\ArretType;
	use App\Repository\ArretTypeRepository;
	use App\Repository\ZoneRepository;
	use Doctrine\Bundle\FixturesBundle\Fixture;
	use Doctrine\Common\DataFixtures\DependentFixtureInterface;
	use Doctrine\Persistence\ObjectManager;
	
	class ArretsFixtures extends Fixture implements DependentFixtureInterface
	{
		private ZoneRepository $zoneRepository;
		
		public function __construct( ZoneRepository $zoneRepository)
		{
			$this->zoneRepository = $zoneRepository;
		}
		
		/**
		 * @inheritDoc
		 */
		public function getDependencies()
		{
			return[
				ZoneFixtures::class,
			];
		}
		
		/**
		 * @inheritDoc
		 */
		public function load(ObjectManager $manager)
		{
			$zones = $this->zoneRepository->findAll();
			
			$arretsName = [
				'Perrache',
				'Ampère Victor Hugo',
				'Bellecour',
				'Cordeliers',
				'Hotel de ville Louis Pradel',
				'Foch',
				'Masséna',
				'Charpennes',
				'République Villeurbanne',
				'Gratte-Ciel',
				'Flachet',
				'Cusset',
				'Laurent Bonnevay',
				'Vaulx-en-Velin La Soie',
				'Zola',
				'Anatole France',
				'Charmettes',
				'Patinoire Baraban',
				'Sacré Coeur',
				'Paul Bert Turnil',
				'Rouget de Lisle',
				'Dauphiné-Lacassagne',
				'Domrémy-Lacassagne',
				'Montplaisir Lumière',
				'Grange-Blanche',
				'Lycée Lumière',
				'Etats-Unis Tony Garnier',
				'Surville Route de Vienne',
				'Saxe-Gambetta',
				'Gare de Villeurbanne',
				'Gare Part-Dieu Villette',
				'Bel Air - Les Brosses',
				'Meyzieu Les Panettes',
				'Gare de Vaise',
				'Debourg'
			];
			
			$arretsTypeNames = [
				'Bus',
				'Métro',
				'Tramway'
			];
			
			
			foreach($arretsName as $arretName){
				$arretTypeIndex = shuffle($arretsTypeNames);
				$zonesIndex = shuffle($zones);
				$arret = new Arret();
				$arret->setName($arretName);
				$arret->setType($arretsTypeNames[$arretTypeIndex]);
				$arret->setZone($zones[$zonesIndex]);
				$manager->persist($arret);
			}
			$manager->flush();
		}
	}