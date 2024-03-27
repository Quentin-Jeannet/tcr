<?php

namespace App\Entity;

use App\Entity\ColorFamily;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ColorFamilyTranslationRepository;

/**
 * @ORM\Entity(repositoryClass=ColorFamilyTranslationRepository::class)
 */
class ColorFamilyTranslation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity=ColorFamily::class, inversedBy="translations")
     */
    private $colorFamily;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $locale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColorFamily(): ?colorFamily
    {
        return $this->colorFamily;
    }

    public function setColorFamily(?colorFamily $colorFamily): self
    {
        $this->colorFamily = $colorFamily;

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

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }
}
