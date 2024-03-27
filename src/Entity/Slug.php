<?php

namespace App\Entity;

use App\Repository\SlugRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SlugRepository::class)
 */
class Slug
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $locale;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $text;

    /**
     * @ORM\OneToOne(targetEntity=CategoryTranslation::class, mappedBy="slug", cascade={"persist", "remove"})
     */
    private $categoryTranslation;

    /**
     * @ORM\OneToOne(targetEntity=SubCategoryTranslation::class, mappedBy="slug", cascade={"persist", "remove"})
     */
    private $subCategoryTranslation;

    public function __toString()
    {
        return $this->text;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): self
    {
        $this->locale = $locale;

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

    public function getCategoryTranslation(): ?CategoryTranslation
    {
        return $this->categoryTranslation;
    }

    public function setCategoryTranslation(?CategoryTranslation $categoryTranslation): self
    {
        // set the owning side of the relation if necessary
        if ($categoryTranslation->getSlug() !== $this) {
            $categoryTranslation->setSlug($this);
        }

        $this->categoryTranslation = $categoryTranslation;

        return $this;
    }

    public function getSubCategoryTranslation(): ?SubCategoryTranslation
    {
        return $this->subCategoryTranslation;
    }

    public function setSubCategoryTranslation(?SubCategoryTranslation $subCategoryTranslation): self
    {
        // set the owning side of the relation if necessary
        if ($subCategoryTranslation->getSlug() !== $this) {
            $subCategoryTranslation->setSlug($this);
        }

        $this->subCategoryTranslation = $subCategoryTranslation;

        return $this;
    }
}
