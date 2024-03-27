<?php

namespace App\Entity;

use Serializable;
use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SubCategoryRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=SubCategoryRepository::class)
 * @Vich\Uploadable
 */
class SubCategory extends CommonCycle implements Serializable
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
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="subCategories")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=SubCategoryTranslation::class, mappedBy="subCategory", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $priority;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="subCategory", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @ORM\OneToOne(targetEntity=Seo::class, inversedBy="subCategory", cascade={"persist", "remove"})
     */
    private $seo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $immutableSlug;

    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->imageName,
            $this->priority,

        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,

        ) = unserialize($serialized);
    }

    // ====================================================== //
    // ==================== CONSTRUCTEUR ==================== //
    // ====================================================== //

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

    // ====================================================== //
    // =================== MAGIC FUNCTION =================== //
    // ====================================================== //
    public function __toString()
    {
        return (!is_null($this->displayName)) ? $this->displayName : "Sous catégorie";
    }

    // ====================================================== //
    // =================== GETTERS/SETTERS ================== //
    // ====================================================== //
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Category>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addSubCategory($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->removeElement($category)) {
            $category->removeSubCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, SubCategoryTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SubCategoryTranslation $subCategoryTranslation): self
    {
        if (!$this->translations->contains($subCategoryTranslation)) {
            $this->translations[] = $subCategoryTranslation;
            $subCategoryTranslation->setSubCategory($this);
        }

        return $this;
    }

    public function removeTranslation(SubCategoryTranslation $subCategoryTranslation): self
    {
        if ($this->translations->removeElement($subCategoryTranslation)) {
            // set the owning side to null (unless already changed)
            if ($subCategoryTranslation->getSubCategory() === $this) {
                $subCategoryTranslation->setSubCategory(null);
            }
        }

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(?int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

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

    public function getImmutableSlug(): ?string
    {
        return $this->immutableSlug;
    }

    public function setImmutableSlug(?string $immutableSlug): self
    {
        $this->immutableSlug = $immutableSlug;

        return $this;
    }
}
