<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
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
    private $cardNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $yearExpiration;

    /**
     * @ORM\Column(type="integer")
     */
    private $monthExpiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cryptogram;

    /**
     * @ORM\ManyToOne(targetEntity=Customer::class, inversedBy="cards")
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardNumber(): ?string
    {
        return $this->cardNumber;
    }

    public function setCardNumber(string $cardNumber): self
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    public function getYearExpiration(): ?int
    {
        return $this->yearExpiration;
    }

    public function setYearExpiration(int $yearExpiration): self
    {
        $this->yearExpiration = $yearExpiration;

        return $this;
    }

    public function getMonthExpiration(): ?int
    {
        return $this->monthExpiration;
    }

    public function setMonthExpiration(int $monthExpiration): self
    {
        $this->monthExpiration = $monthExpiration;

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

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
