<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $complement;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $zip;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="addresses")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=Commande::class, mappedBy="adresseLivraison", cascade={"persist", "remove"})
     */
    private $commandeLivraison;

    /**
     * @ORM\OneToOne(targetEntity=Commande::class, mappedBy="adresseFacturation", cascade={"persist", "remove"})
     */
    private $commandeFacturation;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="adresseLivraison")
     */
    private $commandesLivraison;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="adresseFacturation")
     */
    private $commandesFacturation;

    public function __construct()
    {
        $this->commandesLivraison = new ArrayCollection();
        $this->commandesFacturation = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCommandeLivraison(): ?Commande
    {
        return $this->commandeLivraison;
    }

    public function setCommandeLivraison(Commande $commandeLivraison): self
    {
        // set the owning side of the relation if necessary
        if ($commandeLivraison->getAdresseLivraison() !== $this) {
            $commandeLivraison->setAdresseLivraison($this);
        }

        $this->commandeLivraison = $commandeLivraison;

        return $this;
    }

    public function getCommandeFacturation(): ?Commande
    {
        return $this->commandeFacturation;
    }

    public function setCommandeFacturation(Commande $commandeFacturation): self
    {
        // set the owning side of the relation if necessary
        if ($commandeFacturation->getAdresseFacturation() !== $this) {
            $commandeFacturation->setAdresseFacturation($this);
        }

        $this->commandeFacturation = $commandeFacturation;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandesLivraison(): Collection
    {
        return $this->commandesLivraison;
    }

    public function addCommandesLivraison(Commande $commandesLivraison): self
    {
        if (!$this->commandesLivraison->contains($commandesLivraison)) {
            $this->commandesLivraison[] = $commandesLivraison;
            $commandesLivraison->setAdresseLivraison($this);
        }

        return $this;
    }

    public function removeCommandesLivraison(Commande $commandesLivraison): self
    {
        if ($this->commandesLivraison->removeElement($commandesLivraison)) {
            // set the owning side to null (unless already changed)
            if ($commandesLivraison->getAdresseLivraison() === $this) {
                $commandesLivraison->setAdresseLivraison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandesFacturation(): Collection
    {
        return $this->commandesFacturation;
    }

    public function addCommandesFacturation(Commande $commandesFacturation): self
    {
        if (!$this->commandesFacturation->contains($commandesFacturation)) {
            $this->commandesFacturation[] = $commandesFacturation;
            $commandesFacturation->setAdresseFacturation($this);
        }

        return $this;
    }

    public function removeCommandesFacturation(Commande $commandesFacturation): self
    {
        if ($this->commandesFacturation->removeElement($commandesFacturation)) {
            // set the owning side to null (unless already changed)
            if ($commandesFacturation->getAdresseFacturation() === $this) {
                $commandesFacturation->setAdresseFacturation(null);
            }
        }

        return $this;
    }
}
