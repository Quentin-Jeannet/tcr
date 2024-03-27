<?php

namespace App\Entity;

use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category extends CommonCycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=SubCategory::class, mappedBy="categories")
     */
    private $subCategories;

    /**
     * @ORM\OneToMany(targetEntity=CategoryTranslation::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\OneToMany(targetEntity=ColorFamily::class, mappedBy="category")
     */
    private $colorFamilies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $immutableSlug;

    /**
     * @ORM\OneToMany(targetEntity=Goodies::class, mappedBy="category")
     */
    private $goodies;

    /**
     * @ORM\OneToOne(targetEntity=Seo::class, inversedBy="category", cascade={"persist", "remove"})
     */
    private $seo;

    /**
     * @ORM\OneToMany(targetEntity=FloorFamily::class, mappedBy="category")
     */
    private $floorFamilies;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isMenu;

    public function __construct()
    {
        $this->subCategories = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->colorFamilies = new ArrayCollection();
        $this->goodies = new ArrayCollection();
        $this->floorFamilies = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->displayName;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, SubCategory>
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(SubCategory $subCategory): self
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories[] = $subCategory;
        }

        return $this;
    }

    public function removeSubCategory(SubCategory $subCategory): self
    {
        $this->subCategories->removeElement($subCategory);

        return $this;
    }

    /**
     * @return Collection<int, CategoryTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(CategoryTranslation $categoryTranslation): self
    {
        if (!$this->translations->contains($categoryTranslation)) {
            $this->translations[] = $categoryTranslation;
            $categoryTranslation->setCategory($this);
        }

        return $this;
    }

    public function removeTranslation(CategoryTranslation $categoryTranslation): self
    {
        if ($this->translations->removeElement($categoryTranslation)) {
            // set the owning side to null (unless already changed)
            if ($categoryTranslation->getCategory() === $this) {
                $categoryTranslation->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ColorFamily>
     */
    public function getColorFamilies(): Collection
    {
        return $this->colorFamilies;
    }

    public function addColorFamily(ColorFamily $colorFamily): self
    {
        if (!$this->colorFamilies->contains($colorFamily)) {
            $this->colorFamilies[] = $colorFamily;
            $colorFamily->setCategory($this);
        }

        return $this;
    }

    public function removeColorFamily(ColorFamily $colorFamily): self
    {
        if ($this->colorFamilies->removeElement($colorFamily)) {
            // set the owning side to null (unless already changed)
            if ($colorFamily->getCategory() === $this) {
                $colorFamily->setCategory(null);
            }
        }

        return $this;
    }

    public function getImmutableSlug(): ?string
    {
        return $this->immutableSlug;
    }

    public function setImmutableSlug(?string $immutableSlug): self
    {
        $this->immutableSlug = $immutableSlug;

        return $this;
    }

    /**
     * @return Collection<int, Goodies>
     */
    public function getGoodies(): Collection
    {
        return $this->goodies;
    }

    public function addGoody(Goodies $goody): self
    {
        if (!$this->goodies->contains($goody)) {
            $this->goodies[] = $goody;
            $goody->setCategory($this);
        }

        return $this;
    }

    public function removeGoody(Goodies $goody): self
    {
        if ($this->goodies->removeElement($goody)) {
            // set the owning side to null (unless already changed)
            if ($goody->getCategory() === $this) {
                $goody->setCategory(null);
            }
        }

        return $this;
    }

    public function getSeo(): ?Seo
    {
        return $this->seo;
    }

    public function setSeo(?Seo $seo): self
    {
        $this->seo = $seo;

        return $this;
    }

    /**
     * @return Collection<int, FloorFamily>
     */
    public function getFloorFamilies(): Collection
    {
        return $this->floorFamilies;
    }

    public function addFloorFamily(FloorFamily $floorFamily): self
    {
        if (!$this->floorFamilies->contains($floorFamily)) {
            $this->floorFamilies[] = $floorFamily;
            $floorFamily->setCategory($this);
        }

        return $this;
    }

    public function removeFloorFamily(FloorFamily $floorFamily): self
    {
        if ($this->floorFamilies->removeElement($floorFamily)) {
            // set the owning side to null (unless already changed)
            if ($floorFamily->getCategory() === $this) {
                $floorFamily->setCategory(null);
            }
        }

        return $this;
    }

    public function getIsMenu(): ?bool
    {
        return $this->isMenu;
    }

    public function setIsMenu(bool $isMenu): self
    {
        $this->isMenu = $isMenu;

        return $this;
    }
}
