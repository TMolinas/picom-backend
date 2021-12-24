<?php

namespace App\Entity;

use App\Repository\BankCardRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BankCardRepository::class)
 */
class BankCard
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $creditCardNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $expirationMonth;

    /**
     * @ORM\Column(type="integer")
     */
    private $expirationYear;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $cvc;

    /**
     * @ORM\ManyToMany(targetEntity=Customer::class, inversedBy="bankCards")
     */
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreditCardNumber(): ?string
    {
        return $this->creditCardNumber;
    }

    public function setCreditCardNumber(?string $creditCardNumber): self
    {
        $this->creditCardNumber = $creditCardNumber;

        return $this;
    }

    public function getExpirationMonth(): ?int
    {
        return $this->expirationMonth;
    }

    public function setExpirationMonth(int $expirationMonth): self
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    public function getExpirationYear(): ?int
    {
        return $this->expirationYear;
    }

    public function setExpirationYear(int $expirationYear): self
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    public function getCvc(): ?string
    {
        return $this->cvc;
    }

    public function setCvc(string $cvc): self
    {
        $this->cvc = $cvc;

        return $this;
    }

    /**
     * @return Collection|Customer[]
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(Customer $customer): self
    {
        if (!$this->customers->contains($customer)) {
            $this->customers[] = $customer;
        }

        return $this;
    }

    public function removeCustomer(Customer $customer): self
    {
        $this->customers->removeElement($customer);

        return $this;
    }
}
