<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdvertRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 */
abstract class Advert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="adverts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Customer;

    /**
     * @ORM\ManyToMany(targetEntity=Zone::class, inversedBy="adverts")
     */
    private $zones;

    /**
     * @ORM\ManyToMany(targetEntity=TrancheHoraire::class, mappedBy="adverts")
     */
    private $trancheHoraires;

    public function __construct()
    {
        $this->zones = new ArrayCollection();
        $this->trancheHoraires = new ArrayCollection();
    }

   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->Customer;
    }

    public function setCustomer(?Customer $Customer): self
    {
        $this->Customer = $Customer;

        return $this;
    }

    /**
     * @return Collection|Zone[]
     */
    public function getZones(): Collection
    {
        return $this->zones;
    }

    public function addZone(Zone $zone): self
    {
        if (!$this->zones->contains($zone)) {
            $this->zones[] = $zone;
        }

        return $this;
    }

    public function removeZone(Zone $zone): self
    {
        $this->zones->removeElement($zone);

        return $this;
    }

    /**
     * @return Collection|TrancheHoraire[]
     */
    public function getTrancheHoraires(): Collection
    {
        return $this->trancheHoraires;
    }

    public function addTrancheHoraire(TrancheHoraire $trancheHoraire): self
    {
        if (!$this->trancheHoraires->contains($trancheHoraire)) {
            $this->trancheHoraires[] = $trancheHoraire;
            $trancheHoraire->addAdvert($this);
        }

        return $this;
    }

    public function removeTrancheHoraire(TrancheHoraire $trancheHoraire): self
    {
        if ($this->trancheHoraires->removeElement($trancheHoraire)) {
            $trancheHoraire->removeAdvert($this);
        }

        return $this;
    }
    
  
}
