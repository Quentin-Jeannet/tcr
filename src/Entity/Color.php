<?php

namespace App\Entity;

use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ColorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ColorRepository::class)
 */
class Color extends CommonCycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $hexadecimal1;

    // /**
    //  * @ORM\Column(type="boolean")
    //  */
    // private $active;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $redFromRGBA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $greenFromRGBA;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $blueFromRGBA;

    /**
     * @ORM\OneToMany(targetEntity=ColorTranslation::class, mappedBy="color", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\ManyToMany(targetEntity=ColorFamily::class, inversedBy="colors")
     */
    private $colorFamilies;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="colors")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="color", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $photos;



    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="color")
     */
    private $articles;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, inversedBy="associatedColors")
     */
    private $colors;

    /**
     * @ORM\ManyToMany(targetEntity=Color::class, mappedBy="colors")
     */
    private $associatedColors;

    /**
     * @ORM\OneToMany(targetEntity=ArticleCommande::class, mappedBy="color")
     */
    private $articleCommandes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondeName;

    private $numberFromString;




    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->colorFamilies = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->paniers = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->colors = new ArrayCollection();
        $this->associatedColors = new ArrayCollection();
        $this->articleCommandes = new ArrayCollection();
    }

    public function __toString()
    {
        if(!is_null($this->displayName)){
            return $this->displayName;
        }
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getHexadecimal1(): ?string
    {
        return $this->hexadecimal1;
    }

    public function setHexadecimal1(string $hexadecimal1): self
    {
        $this->hexadecimal1 = $hexadecimal1;

        return $this;
    }

    // public function getActive(): ?bool
    // {
    //     return $this->active;
    // }

    // public function setActive(bool $active): self
    // {
    //     $this->active = $active;

    //     return $this;
    // }

    public function getRedFromRGBA(): ?int
    {
        return $this->redFromRGBA;
    }

    public function setRedFromRGBA(?int $redFromRGBA): self
    {
        $this->redFromRGBA = $redFromRGBA;

        return $this;
    }

    public function getGreenFromRGBA(): ?int
    {
        return $this->greenFromRGBA;
    }

    public function setGreenFromRGBA(?int $greenFromRGBA): self
    {
        $this->greenFromRGBA = $greenFromRGBA;

        return $this;
    }

    public function getBlueFromRGBA(): ?int
    {
        return $this->blueFromRGBA;
    }

    public function setBlueFromRGBA(?int $blueFromRGBA): self
    {
        $this->blueFromRGBA = $blueFromRGBA;

        return $this;
    }

    /**
     * @return Collection<int, ColorTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(ColorTranslation $colorTranslation): self
    {
        if (!$this->translations->contains($colorTranslation)) {
            $this->translations[] = $colorTranslation;
            $colorTranslation->setColor($this);
        }

        return $this;
    }

    public function removeTranslation(ColorTranslation $colorTranslation): self
    {
        if ($this->translations->removeElement($colorTranslation)) {
            // set the owning side to null (unless already changed)
            if ($colorTranslation->getColor() === $this) {
                $colorTranslation->setColor(null);
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
        }

        return $this;
    }

    public function removeColorFamily(ColorFamily $colorFamily): self
    {
        $this->colorFamilies->removeElement($colorFamily);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addColor($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setColor($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getColor() === $this) {
                $photo->setColor(null);
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
            $article->setColor($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getColor() === $this) {
                $article->setColor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getColors(): Collection
    {
        return $this->colors;
    }

    public function addColor(self $color): self
    {
        if (!$this->colors->contains($color)) {
            $this->colors[] = $color;
        }

        return $this;
    }

    public function removeColor(self $color): self
    {
        $this->colors->removeElement($color);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getAssociatedColors(): Collection
    {
        return $this->associatedColors;
    }

    public function addAssociatedColor(self $associatedColor): self
    {
        if (!$this->associatedColors->contains($associatedColor)) {
            $this->associatedColors[] = $associatedColor;
            $associatedColor->addColor($this);
        }

        return $this;
    }

    public function removeAssociatedColor(self $associatedColor): self
    {
        if ($this->associatedColors->removeElement($associatedColor)) {
            $associatedColor->removeColor($this);
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
            $articleCommande->setColor($this);
        }

        return $this;
    }

    public function removeArticleCommande(ArticleCommande $articleCommande): self
    {
        if ($this->articleCommandes->removeElement($articleCommande)) {
            // set the owning side to null (unless already changed)
            if ($articleCommande->getColor() === $this) {
                $articleCommande->setColor(null);
            }
        }

        return $this;
    }

    public function getSecondeName(): ?string
    {
        return $this->secondeName;
    }

    public function setSecondeName(?string $secondeName): self
    {
        $this->secondeName = $secondeName;

        return $this;
    }





    /**
     * Get the value of numberFromString
     */ 
    public function getNumberFromString()
    {
        return $this->numberFromString;
    }

    /**
     * Set the value of numberFromString
     *
     * @return  self
     */ 
    public function setNumberFromString($numberFromString)
    {
        $this->numberFromString = $numberFromString;

        return $this;
    }
}
