<?php

namespace App\Entity;

use App\Entity\CommonCycle;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FloorFamilyRepository;

/**
 * @ORM\Entity(repositoryClass=FloorFamilyRepository::class)
 */
class FloorFamily extends CommonCycle
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
     * @ORM\OneToMany(targetEntity=FloorFamilyTranslation::class, mappedBy="floorFamily", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="floorFamilies")
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=Floor::class, mappedBy="floorFamily")
     */
    private $floors;

    /**
     * @ORM\OneToMany(targetEntity=FloorPrice::class, mappedBy="floorFamily", orphanRemoval=true)
     */
    private $floorPrices;

    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //
    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->floors = new ArrayCollection();
        $this->floorPrices = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUNCTION =================== //
    // ====================================================== //
    public function __toString()
    {
        return $this->displayName;
    }


    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, FloorFamilyTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(FloorFamilyTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setFloorFamily($this);
        }

        return $this;
    }

    public function removeTranslation(FloorFamilyTranslation $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getFloorFamily() === $this) {
                $translation->setFloorFamily(null);
            }
        }

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection<int, Floor>
     */
    public function getFloors(): Collection
    {
        return $this->floors;
    }

    public function addFloor(Floor $floor): self
    {
        if (!$this->floors->contains($floor)) {
            $this->floors[] = $floor;
            $floor->setFloorFamily($this);
        }

        return $this;
    }

    public function removeFloor(Floor $floor): self
    {
        if ($this->floors->removeElement($floor)) {
            // set the owning side to null (unless already changed)
            if ($floor->getFloorFamily() === $this) {
                $floor->setFloorFamily(null);
            }
        }

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
            $floorPrice->setFloorFamily($this);
        }

        return $this;
    }

    public function removeFloorPrice(FloorPrice $floorPrice): self
    {
        if ($this->floorPrices->removeElement($floorPrice)) {
            // set the owning side to null (unless already changed)
            if ($floorPrice->getFloorFamily() === $this) {
                $floorPrice->setFloorFamily(null);
            }
        }

        return $this;
    }
}
