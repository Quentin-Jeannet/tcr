<?php

namespace App\Entity;

use App\Repository\FloorPriceThicknessRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FloorPriceThicknessRepository::class)
 */
class FloorPriceThickness
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
     * @ORM\Column(type="string", length=255)
     */
    private $thickness;

    /**
     * @ORM\OneToMany(targetEntity=FloorPrice::class, mappedBy="floorThickness", orphanRemoval=true)
     */
    private $floorPrices;

    // ====================================================== //
    // ==================== CONSTRCUTEUR ==================== //
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
        return $this->thickness;
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThickness(): ?string
    {
        return $this->thickness;
    }

    public function setThickness(string $thickness): self
    {
        $this->thickness = $thickness;

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
            $floorPrice->setFloorThickness($this);
        }

        return $this;
    }

    public function removeFloorPrice(FloorPrice $floorPrice): self
    {
        if ($this->floorPrices->removeElement($floorPrice)) {
            // set the owning side to null (unless already changed)
            if ($floorPrice->getFloorThickness() === $this) {
                $floorPrice->setFloorThickness(null);
            }
        }

        return $this;
    }
}
