<?php

namespace App\Entity;

use App\Repository\PriceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PriceRepository::class)
 */
class Price
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    // ~~~~~~~~~~~~~~~~ PAINT ~~~~~~~~~~~~~~~~ //

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $litre;


    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $mesure;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantity;

    /**
     * @ORM\ManyToOne(targetEntity=Finish::class, inversedBy="prices")
     */
    private $finish;

    // 

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="ActualPrice")
     */
    private $articles;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $articleType;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLitre(): ?string
    {
        return $this->litre;
    }

    public function setLitre(string $litre): self
    {
        $this->litre = $litre;

        return $this;
    }


    public function getMesure(): ?string
    {
        return $this->mesure;
    }

    public function setMesure(?string $mesure): self
    {
        $this->mesure = $mesure;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(?float $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getFinish(): ?Finish
    {
        return $this->finish;
    }

    public function setFinish(?Finish $finish): self
    {
        $this->finish = $finish;

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
            $article->setActualPrice($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getActualPrice() === $this) {
                $article->setActualPrice(null);
            }
        }

        return $this;
    }

    public function getArticleType(): ?string
    {
        return $this->articleType;
    }

    public function setArticleType(?string $articleType): self
    {
        $this->articleType = $articleType;

        return $this;
    }
}
