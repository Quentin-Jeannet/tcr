<?php

namespace App\Entity;

use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ColorFamilyRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ColorFamilyRepository::class)
 */
class ColorFamily extends CommonCycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=ColorFamilyTranslation::class, mappedBy="colorFamily", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="colorFamilies")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, mappedBy="colorFamilies")
     */
    private $colors;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $text;
    
    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->colors = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->displayName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, ColorFamilyTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(ColorFamilyTranslation $colorFamilyTranslation): self
    {
        if (!$this->translations->contains($colorFamilyTranslation)) {
            $this->translations[] = $colorFamilyTranslation;
            $colorFamilyTranslation->setColorFamily($this);
        }

        return $this;
    }

    public function removeTranslation(ColorFamilyTranslation $colorFamilyTranslation): self
    {
        if ($this->translations->removeElement($colorFamilyTranslation)) {
            // set the owning side to null (unless already changed)
            if ($colorFamilyTranslation->getColorFamily() === $this) {
                $colorFamilyTranslation->setColorFamily(null);
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

    /**
     * @return Collection<int, Color>
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(Color $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
            $color->addColorFamily($this);
        }

        return $this;
    }

    public function removeColor(Color $color): self
    {
        if ($this->colors->removeElement($color)) {
            $color->removeColorFamily($this);
        }

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
