<?php

namespace App\Entity;

use App\Repository\ConfiguratorOptionTranslationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConfiguratorOptionTranslationRepository::class)
 */
class ConfiguratorOptionTranslation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity=ConfiguratorOption::class, inversedBy="translations")
     */
    private $configuratorOption;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getConfiguratorOption(): ?ConfiguratorOption
    {
        return $this->configuratorOption;
    }

    public function setConfiguratorOption(?ConfiguratorOption $configuratorOption): self
    {
        $this->configuratorOption = $configuratorOption;

        return $this;
    }
}
