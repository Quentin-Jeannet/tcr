<?php

namespace App\Entity;

use App\Repository\FinishRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FinishRepository::class)
 */
class Finish extends CommonCycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\OneToMany(targetEntity=Price::class, mappedBy="finish")
     */
    private $prices;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="finish")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity=FinishTranslation::class, mappedBy="finish")
     */
    private $translations;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCommande::class, mappedBy="finish")
     */
    private $articleCommandes;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->articleCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return Collection<int, Price>
     */
    public function getPrices(): Collection
    {
        return $this->prices;
    }

    public function addPrice(Price $price): self
    {
        if (!$this->prices->contains($price)) {
            $this->prices[] = $price;
            $price->setFinish($this);
        }

        return $this;
    }

    public function removePrice(Price $price): self
    {
        if ($this->prices->removeElement($price)) {
            // set the owning side to null (unless already changed)
            if ($price->getFinish() === $this) {
                $price->setFinish(null);
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
            $article->setFinish($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getFinish() === $this) {
                $article->setFinish(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FinishTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(FinishTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setFinish($this);
        }

        return $this;
    }

    public function removeTranslation(FinishTranslation $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getFinish() === $this) {
                $translation->setFinish(null);
            }
        }

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
            $articleCommande->setFinish($this);
        }

        return $this;
    }

    public function removeArticleCommande(ArticleCommande $articleCommande): self
    {
        if ($this->articleCommandes->removeElement($articleCommande)) {
            // set the owning side to null (unless already changed)
            if ($articleCommande->getFinish() === $this) {
                $articleCommande->setFinish(null);
            }
        }

        return $this;
    }
}
