<?php

namespace App\Entity;

use App\Repository\FloorPriceFinitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FloorPriceFinitionRepository::class)
 */
class FloorPriceFinition
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=FloorPrice::class, mappedBy="floorFinition")
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
        return $this->name;
    }
    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
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
            $floorPrice->setFloorFinition($this);
        }

        return $this;
    }

    public function removeFloorPrice(FloorPrice $floorPrice): self
    {
        if ($this->floorPrices->removeElement($floorPrice)) {
            // set the owning side to null (unless already changed)
            if ($floorPrice->getFloorFinition() === $this) {
                $floorPrice->setFloorFinition(null);
            }
        }

        return $this;
    }
}
