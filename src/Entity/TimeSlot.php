<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TimeSlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TimeSlotRepository::class)
 */
class TimeSlot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $beginHour;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $priceCoefficient;

    /**
     * @ORM\ManyToMany(targetEntity=Advertising::class, mappedBy="timeSlots")
     */
    private $advertisings;

    public function __construct()
    {
        $this->advertisings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBeginHour(): ?\DateTimeInterface
    {
        return $this->beginHour;
    }

    public function setBeginHour(\DateTimeInterface $beginHour): self
    {
        $this->beginHour = $beginHour;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriceCoefficient(): ?float
    {
        return $this->priceCoefficient;
    }

    public function setPriceCoefficient(float $priceCoefficient): self
    {
        $this->priceCoefficient = $priceCoefficient;

        return $this;
    }

    /**
     * @return Collection|Advertising[]
     */
    public function getAdvertisings(): Collection
    {
        return $this->advertisings;
    }

    public function addAdvertising(Advertising $advertising): self
    {
        if (!$this->advertisings->contains($advertising)) {
            $this->advertisings[] = $advertising;
            $advertising->addTimeSlot($this);
        }

        return $this;
    }

    public function removeAdvertising(Advertising $advertising): self
    {
        if ($this->advertisings->removeElement($advertising)) {
            $advertising->removeTimeSlot($this);
        }

        return $this;
    }
}
