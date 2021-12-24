<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 */
class Area
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
     * @ORM\OneToMany(targetEntity=BusStop::class, mappedBy="area")
     */
    private $busStops;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    public function __construct()
    {
        $this->busStops = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|BusStop[]
     */
    public function getBusStops(): Collection
    {
        return $this->busStops;
    }

    public function addBusStop(BusStop $busStop): self
    {
        if (!$this->busStops->contains($busStop)) {
            $this->busStops[] = $busStop;
            $busStop->setArea($this);
        }

        return $this;
    }

    public function removeBusStop(BusStop $busStop): self
    {
        if ($this->busStops->removeElement($busStop)) {
            // set the owning side to null (unless already changed)
            if ($busStop->getArea() === $this) {
                $busStop->setArea(null);
            }
        }

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
}
