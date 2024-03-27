<?php

namespace App\Entity;

use App\Repository\FloorPriceLengthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FloorPriceLengthRepository::class)
 */
class FloorPriceLength
{
    // ====================================================== //
// ===================== PROPRIETES ===================== //
// ====================================================== //
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $length;

    /**
     * @ORM\ManyToMany(targetEntity=FloorPrice::class, mappedBy="floorlengths")
     */
    private $floorPrices;


    // ====================================================== //
// ==================== CONSTRUCTEUR ==================== //
// ====================================================== //
    public function __construct()
    {
        $this->floorPrices = new ArrayCollection();
    }

    // ====================================================== //
// =================== MAGIC FUNCTION =================== //
// ====================================================== //

public function __toString()
{
    // return "coucou";
    return (!is_null($this->length)) ? $this->length." mm" : 'N/A';
}

// ====================================================== //
// =================== GETTERS/SETTERS ================== //
// ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLength(): ?float
    {
        return $this->length;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return Collection<int, FloorPrice>
     */
    public function getFloorPrices(): Collection
    {
        return $this->floorPrices;
    }

    public function addFloorPrice(FloorPrice $floorPrice): self
    {
        if (!$this->floorPrices->contains($floorPrice)) {
            $this->floorPrices[] = $floorPrice;
            $floorPrice->addFloorlength($this);
        }

        return $this;
    }

    public function removeFloorPrice(FloorPrice $floorPrice): self
    {
        if ($this->floorPrices->removeElement($floorPrice)) {
            $floorPrice->removeFloorlength($this);
        }

        return $this;
    }
}
