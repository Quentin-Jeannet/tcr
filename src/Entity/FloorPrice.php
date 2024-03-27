<?php

namespace App\Entity;

use App\Entity\FloorFamily;
use App\Entity\FloorPriceType;
use App\Entity\FloorPriceWidth;
use App\Entity\FloorPriceLength;
use App\Entity\FloorPriceRender;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\FloorPriceCategory;
use App\Entity\FloorPriceFinition;
use App\Entity\FloorPriceThickness;
use App\Repository\FloorPriceRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=FloorPriceRepository::class)
 */
class FloorPrice
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
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=FloorFamily::class, inversedBy="floorPrices", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $floorFamily;

    /**
     * @ORM\ManyToOne(targetEntity=FloorPriceThickness::class, inversedBy="floorPrices", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $floorThickness;

    /**
     * @ORM\ManyToOne(targetEntity=FloorPriceType::class, inversedBy="floorPrices", cascade={"persist"})
     */
    private $floorType;

    /**
     * @ORM\ManyToOne(targetEntity=FloorPriceWidth::class, inversedBy="floorPrices", cascade={"persist"})
     */
    private $floorWidth;

    /**
     * @ORM\ManyToOne(targetEntity=FloorPriceFinition::class, inversedBy="floorPrices", cascade={"persist"})
     */
    private $floorFinition;

    /**
     * @ORM\ManyToMany(targetEntity=FloorPriceLength::class, inversedBy="floorPrices", cascade={"persist"})
     */
    private $floorlengths;

    /**
     * @ORM\ManyToOne(targetEntity=FloorPriceRender::class, inversedBy="floorPrices", cascade={"persist"})
     */
    private $floorRender;

    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //

    public function __construct()
    {
        $this->floorlengths = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUNCTION =================== //
    // ====================================================== //
    public function __toString()
    {
        return 'Render:'.$this->floorRender.'Thickness: '.$this->floorThickness.' Price:'.$this->price."";
    }

    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFloorFamily(): ?FloorFamily
    {
        return $this->floorFamily;
    }

    public function setFloorFamily(?FloorFamily $floorFamily): self
    {
        $this->floorFamily = $floorFamily;

        return $this;
    }

    public function getFloorThickness(): ?FloorPriceThickness
    {
        return $this->floorThickness;
    }

    public function setFloorThickness(?FloorPriceThickness $floorThickness): self
    {
        $this->floorThickness = $floorThickness;

        return $this;
    }

    public function getFloorType(): ?FloorPriceType
    {
        return $this->floorType;
    }

    public function setFloorType(?FloorPriceType $floorType): self
    {
        $this->floorType = $floorType;

        return $this;
    }

    public function getFloorWidth(): ?FloorPriceWidth
    {
        return $this->floorWidth;
    }

    public function setFloorWidth(?FloorPriceWidth $floorPriceWidth): self
    {
        $this->floorWidth = $floorPriceWidth;

        return $this;
    }

    public function getFloorFinition(): ?FloorPriceFinition
    {
        return $this->floorFinition;
    }

    public function setFloorFinition(?FloorPriceFinition $floorFinition): self
    {
        $this->floorFinition = $floorFinition;

        return $this;
    }

    /**
     * @return Collection<int, FloorPriceLength>
     */
    public function getFloorlengths(): Collection
    {
        return $this->floorlengths;
    }

    public function addFloorlength(FloorPriceLength $floorlength): self
    {
        if (!$this->floorlengths->contains($floorlength)) {
            $this->floorlengths[] = $floorlength;
        }

        return $this;
    }

    public function removeFloorlength(FloorPriceLength $floorlength): self
    {
        $this->floorlengths->removeElement($floorlength);

        return $this;
    }

    public function getFloorRender(): ?FloorPriceRender
    {
        return $this->floorRender;
    }

    public function setFloorRender(?FloorPriceRender $floorRender): self
    {
        $this->floorRender = $floorRender;

        return $this;
    }
}
