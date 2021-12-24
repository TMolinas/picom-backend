<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdvertisingPictureRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Advertising;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdvertisingPictureRepository::class)
 */
class AdvertisingPicture extends Advertising
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
