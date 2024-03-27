<?php

namespace App\Entity;

use App\Repository\FloorPriceWidthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FloorPriceWidthRepository::class)
 */
class FloorPriceWidth
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $widthIntitule;

    /**
     * @ORM\OneToMany(targetEntity=FloorPrice::class, mappedBy="FloorPriceWidth")
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
        return (!is_null($this->widthIntitule)) ? $this->widthIntitule : $this->width;
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;

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
            $floorPrice->setFloorWidth($this);
        }

        return $this;
    }

    public function removeFloorPrice(FloorPrice $floorPrice): self
    {
        if ($this->floorPrices->removeElement($floorPrice)) {
            // set the owning side to null (unless already changed)
            if ($floorPrice->getFloorWidth() === $this) {
                $floorPrice->setFloorWidth(null);
            }
        }

        return $this;
    }

    public function getWidthIntitule(): ?string
    {
        return $this->widthIntitule;
    }

    public function setWidthIntitule(?string $widthIntitule): self
    {
        $this->widthIntitule = $widthIntitule;

        return $this;
    }
}
