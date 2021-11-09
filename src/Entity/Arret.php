<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ArretRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ArretRepository::class)
 */
 class Arret
                  {
                      /**
                       * @ORM\Id
                       * @ORM\GeneratedValue
                       * @ORM\Column(type="integer")
                       */
                      private $id;
                  
                      /**
                       * @ORM\Column(type="string", length=255)
                       */
                      private $name;
                  
                      /**
                       * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="arrets")
                       * @ORM\JoinColumn(nullable=false)
                       */
                      private $zone;
      
                      /**
                       * @ORM\Column(type="string", length=255)
                       */
                      private $type;
         		 
                      public function getId(): ?int
                      {
                          return $this->id;
                      }
                  
                      public function getName(): string
                      {
                          return $this->name;
                      }
                  
                      public function setName(string $name): self
                      {
                          $this->name = $name;
                  
                          return $this;
                      }
                  
                      public function getZone(): ?Zone
                      {
                          return $this->zone;
                      }
                  
                      public function setZone(?Zone $zone): self
                      {
                          $this->zone = $zone;
                  
                          return $this;
                      }
         		 
         	 public function __toString()
         	 {
         		 return $this->getName();
         	 }
   
           public function getType(): ?string
           {
               return $this->type;
           }

           public function setType(string $type): self
           {
               $this->type = $type;

               return $this;
           }
         	
         	
          }
