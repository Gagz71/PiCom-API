<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CreditCardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CreditCardRepository::class)
 */
class CreditCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="creditCards")
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cardNumbers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expirationYear;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $expirationMonth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cryptogram;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    public function getCardNumbers(): ?string
    {
        return $this->cardNumbers;
    }

    public function setCardNumbers(string $cardNumbers): self
    {
        $this->cardNumbers = $cardNumbers;

        return $this;
    }

    public function getExpirationYear(): ?\DateTimeInterface
    {
        return $this->expirationYear;
    }

    public function setExpirationYear(string $expirationYear): self
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    public function getExpirationMonth(): ?string
    {
        return $this->expirationMonth;
    }

    public function setExpirationMonth(string $expirationMonth): self
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    public function getCryptogram(): ?string
    {
        return $this->cryptogram;
    }

    public function setCryptogram(string $cryptogram): self
    {
        $this->cryptogram = $cryptogram;

        return $this;
    }
}
