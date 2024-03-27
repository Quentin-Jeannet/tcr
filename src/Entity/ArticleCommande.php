<?php

namespace App\Entity;

use App\Repository\ArticleCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleCommandeRepository::class)
 */
class ArticleCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="articles")
     */
    private $commande;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

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
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="articleCommandes")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Finish::class, inversedBy="articleCommandes")
     */
    private $finish;

    /**
     * @ORM\ManyToOne(targetEntity=Goodies::class, inversedBy="articleCommandes")
     */
    private $goodie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
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
