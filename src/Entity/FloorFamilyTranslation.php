<?php

namespace App\Entity;

use App\Repository\FloorFamilyTranslationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FloorFamilyTranslationRepository::class)
 */
class FloorFamilyTranslation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity=FloorFamily::class, inversedBy="translations")
     */
    private $floorFamily;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
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

    public function getFloorFamily(): ?FloorFamily
    {
        return $this->floorFamily;
    }

    public function setFloorFamily(?FloorFamily $floorFamily): self
    {
        $this->floorFamily = $floorFamily;

        return $this;
    }
}
