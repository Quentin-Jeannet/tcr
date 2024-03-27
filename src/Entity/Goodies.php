<?php

namespace App\Entity;

use Serializable;
use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GoodiesRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=GoodiesRepository::class)
 * @Vich\Uploadable
 */
class Goodies extends CommonCycle implements Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="goodies", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageName;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\OneToMany(targetEntity=GoodiesTranslation::class, mappedBy="goodies", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="goodies")
     */
    private $category;

    /**
     * @ORM\OneToOne(targetEntity=ArticleCommande::class, mappedBy="goodie", cascade={"persist", "remove"})
     */
    private $articleCommande;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCommande::class, mappedBy="goodie")
     */
    private $articleCommandes;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="goodie")
     */
    private $articles;

    // ====================================================== //
    // ====================== METHODES ====================== //
    // ====================================================== //
    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->imageName,
            $this->price,
            $this->currentTranslation,


        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->imageName,
            $this->price,
            $this->currentTranslation,

        ) = unserialize($serialized);
    }




    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->articleCommandes = new ArrayCollection();
        $this->articles = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }


    /**
     * @return Collection<int, GoodiesTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(GoodiesTranslation $goodiesTranslation): self
    {
        if (!$this->translations->contains($goodiesTranslation)) {
            $this->translations[] = $goodiesTranslation;
            $goodiesTranslation->setGoodies($this);
        }

        return $this;
    }

    public function removeTranslation(GoodiesTranslation $goodiesTranslation): self
    {
        if ($this->translations->removeElement($goodiesTranslation)) {
            // set the owning side to null (unless already changed)
            if ($goodiesTranslation->getGoodies() === $this) {
                $goodiesTranslation->setGoodies(null);
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

    public function getArticleCommande(): ?ArticleCommande
    {
        return $this->articleCommande;
    }

    public function setArticleCommande(?ArticleCommande $articleCommande): self
    {
        // unset the owning side of the relation if necessary
        if ($articleCommande === null && $this->articleCommande !== null) {
            $this->articleCommande->setGoodie(null);
        }

        // set the owning side of the relation if necessary
        if ($articleCommande !== null && $articleCommande->getGoodie() !== $this) {
            $articleCommande->setGoodie($this);
        }

        $this->articleCommande = $articleCommande;

        return $this;
    }

    /**
     * @return Collection<int, ArticleCommande>
     */
    public function getArticleCommandes(): Collection
    {
        return $this->articleCommandes;
    }

    public function addArticleCommande(ArticleCommande $articleCommande): self
    {
        if (!$this->articleCommandes->contains($articleCommande)) {
            $this->articleCommandes[] = $articleCommande;
            $articleCommande->setGoodie($this);
        }

        return $this;
    }

    public function removeArticleCommande(ArticleCommande $articleCommande): self
    {
        if ($this->articleCommandes->removeElement($articleCommande)) {
            // set the owning side to null (unless already changed)
            if ($articleCommande->getGoodie() === $this) {
                $articleCommande->setGoodie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setGoodie($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getGoodie() === $this) {
                $article->setGoodie(null);
            }
        }

        return $this;
    }

}
