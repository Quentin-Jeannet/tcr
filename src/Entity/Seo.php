<?php

namespace App\Entity;

use App\Repository\SeoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SeoRepository::class)
 */
class Seo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class)
     */
    private $author;

    /**
     * @ORM\OneToMany(targetEntity=SeoTranslation::class, mappedBy="seo", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $translations;

    /**
     * @ORM\OneToOne(targetEntity=Category::class, mappedBy="seo", cascade={"persist", "remove"})
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity=SubCategory::class, mappedBy="seo", cascade={"persist", "remove"})
     */
    private $subCategory;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection<int, SeoTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(SeoTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setSeo($this);
        }

        return $this;
    }

    public function removeTranslation(SeoTranslation $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getSeo() === $this) {
                $translation->setSeo(null);
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
        // unset the owning side of the relation if necessary
        if ($category === null && $this->category !== null) {
            $this->category->setSeo(null);
        }

        // set the owning side of the relation if necessary
        if ($category !== null && $category->getSeo() !== $this) {
            $category->setSeo($this);
        }

        $this->category = $category;

        return $this;
    }

    public function getSubCategory(): ?SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubCategory $subCategory): self
    {
        // unset the owning side of the relation if necessary
        if ($subCategory === null && $this->subCategory !== null) {
            $this->subCategory->setSeo(null);
        }

        // set the owning side of the relation if necessary
        if ($subCategory !== null && $subCategory->getSeo() !== $this) {
            $subCategory->setSeo($this);
        }

        $this->subCategory = $subCategory;

        return $this;
    }
}
