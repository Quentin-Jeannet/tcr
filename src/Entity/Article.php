<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="articles")
     */
    private $panier;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fixedPrice;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $liter;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $meters;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="articles" ,cascade={"persist"})
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Price::class, inversedBy="articles")
     */
    private $actualPrice;

    /**
     * @ORM\ManyToOne(targetEntity=Finish::class, inversedBy="articles")
     */
    private $finish;

    /**
     * @ORM\ManyToOne(targetEntity=Goodies::class, inversedBy="articles")
     */
    private $goodie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanier(): ?Panier
    {
        return $this->panier;
    }

    public function setPanier(?Panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }

    public function getFixedPrice(): ?float
    {
        return $this->fixedPrice;
    }

    public function setFixedPrice(?float $fixedPrice): self
    {
        $this->fixedPrice = $fixedPrice;

        return $this;
    }

    public function getLiter(): ?float
    {
        return $this->liter;
    }

    public function setLiter(?float $liter): self
    {
        $this->liter = $liter;

        return $this;
    }

    public function getMeters(): ?float
    {
        return $this->meters;
    }

    public function setMeters(?float $meters): self
    {
        $this->meters = $meters;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }



    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getActualPrice(): ?Price
    {
        return $this->actualPrice;
    }

    public function setActualPrice(?Price $actualPrice): self
    {
        $this->actualPrice = $actualPrice;

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

    public function getGoodie(): ?Goodies
    {
        return $this->goodie;
    }

    public function setGoodie(?Goodies $goodie): self
    {
        $this->goodie = $goodie;

        return $this;
    }
}
