<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Yaml\Yaml;
use App\Repository\CommonCycleRepository;

abstract class CommonCycle
{
    /**
     * @ORM\Column(type="datetime_immutable")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    protected $updatedAt;

/**
     * @var User $createdBy
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", fetch="LAZY")
     * @ORM\JoinColumn(name="created_by_id", referencedColumnName="id")
     */
    protected $createdBy;

    /**
     * @var User $updatedBy
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", fetch="LAZY")
     * @ORM\JoinColumn(name="updated_by_id", referencedColumnName="id", nullable=true)
     */
    protected $updatedBy;

    /** 
     * @ORM\Column(name="rankOrder", type="integer", nullable=true)
     */
    protected $rankOrder;

    
    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=true)
     */
    protected $isActive = true;


    protected $locales;
    protected $currentTranslation;
    protected $displayName;


    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    /**
     * Get the value of locales
     */ 
    public function getLocales()
    {
        $value = Yaml::parse(file_get_contents(__DIR__ . '/../../config/packages/translation.yaml'));
        $this->locales = $value["framework"]["translator"]["enabled_locales"];
        return $this->locales;
    }

    /**
     * Set the value of locales
     *
     * @return  self
     */ 
    public function setLocales($locales)
    {
        $this->locales = $locales;

        return $this;
    }

    /**
     * Get the value of currentTranslation
     */ 
    public function getCurrentTranslation()
    {
        return $this->currentTranslation;
    }

    /**
     * Set the value of currentTranslation
     *
     * @return  self
     */ 
    public function setCurrentTranslation($currentTranslation)
    {
        $this->currentTranslation = $currentTranslation;

        return $this;
    }

    /**
     * Get the value of displayName
     */ 
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set the value of displayName
     *
     * @return  self
     */ 
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get $createdBy
     *
     * @return  User
     */ 
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set $createdBy
     *
     * @param  User  $createdBy  $createdBy
     *
     * @return  self
     */ 
    public function setCreatedBy(User $createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get $updatedBy
     *
     * @return  User
     */ 
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set $updatedBy
     *
     * @param  User  $updatedBy  $updatedBy
     *
     * @return  self
     */ 
    public function setUpdatedBy(User $updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get the value of rank
     */ 
    public function getRankOrder()
    {
        return $this->rankOrder;
    }

    /**
     * Set the value of rank
     *
     * @return  self
     */ 
    public function setRankOrder($rankOrder)
    {
        $this->rankOrder = $rankOrder;

        return $this;
    }

    /**
     * Get the value of isActive
     */ 
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set the value of isActive
     *
     * @return  self
     */ 
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

}
