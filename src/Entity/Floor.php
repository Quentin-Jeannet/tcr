<?php

namespace App\Entity;

use App\Entity\CommonCycle;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FloorRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=FloorRepository::class)
 * @Vich\Uploadable
 */
class Floor extends CommonCycle
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
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="floor", fileNameProperty="imageName")
     * @var File
     */
    private $imageFile;



    /**
     * @ORM\Column(type="string", length=100)
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity=FloorTranslation::class, mappedBy="floor", cascade={"persist", "remove"})
     */
    private $translations;

    /**
     * @ORM\ManyToOne(targetEntity=FloorFamily::class, inversedBy="floors")
     */
    private $floorFamily;

    /**
     * @ORM\OneToMany(targetEntity=Photo::class, mappedBy="floor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $photos;

    /**
     * @ORM\ManyToMany(targetEntity=FloorPattern::class, inversedBy="floors")
     */
    private $patterns;

    private $numberFromString;


    public function __toString()
    {
        return $this->displayName;
    }

    public function __construct()
    {
        $this->translations = new ArrayCollection();
        $this->photos = new ArrayCollection();
        $this->patterns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setImageFile(?File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTimeImmutable('now');
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
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

    /**
     * @return Collection<int, FloorTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(FloorTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setFloor($this);
        }

        return $this;
    }

    public function removeTranslation(FloorTranslation $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getFloor() === $this) {
                $translation->setFloor(null);
            }
        }

        return $this;
    }

    public function getFloorFamily(): ?FloorFamily
    {
        return $this->floorFamily;
    }

    public function setFloorFamily(?FloorFamily $floorFamily): self
    {
        $this->floorFamily = $floorFamily;

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
            $photo->setFloor($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getFloor() === $this) {
                $photo->setFloor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FloorPattern>
     */
    public function getPatterns(): Collection
    {
        return $this->patterns;
    }

    public function addPattern(FloorPattern $pattern): self
    {
        if (!$this->patterns->contains($pattern)) {
            $this->patterns[] = $pattern;
        }

        return $this;
    }

    public function removePattern(FloorPattern $pattern): self
    {
        $this->patterns->removeElement($pattern);

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
