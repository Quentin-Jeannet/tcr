<?php

namespace App\Entity;

use App\Repository\ConfiguratorOrientationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConfiguratorOrientationRepository::class)
 */
class ConfiguratorOrientation extends CommonCycle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=ConfiguratorOrientationTranslation::class, mappedBy="configuratorOrientation")
     */
    private $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ConfiguratorOrientationTranslation>
     */
    public function getTranslations(): Collection
    {
        return $this->translations;
    }

    public function addTranslation(ConfiguratorOrientationTranslation $translation): self
    {
        if (!$this->translations->contains($translation)) {
            $this->translations[] = $translation;
            $translation->setConfiguratorOrientation($this);
        }

        return $this;
    }

    public function removeTranslation(ConfiguratorOrientationTranslation $translation): self
    {
        if ($this->translations->removeElement($translation)) {
            // set the owning side to null (unless already changed)
            if ($translation->getConfiguratorOrientation() === $this) {
                $translation->setConfiguratorOrientation(null);
            }
        }

        return $this;
    }
}
