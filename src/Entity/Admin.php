<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdminRepository::class)
 */
class Admin extends User
{
	/**
	 * @see UserInterface
	 */
	public function getRoles(): array
	{
		$roles = parent::getRoles();
		// guarantee every user at least has ROLE_USER
		$roles[] = 'ROLE_ADMIN';
		
		return array_unique($roles);
	}
	
	
	
}
