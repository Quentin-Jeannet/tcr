<?php
namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigurateurPngOriginal
 *
 * @ORM\Table(name="configurateur_png_original")
 * @ORM\Entity(repositoryClass=ConfigurateurPngOriginalRepository::class)
 */

class ConfigurateurPngOriginal
{
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="path", type="string")
     */
    private $path;

    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     * 
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity=ConfigurateurPngMask::class, mappedBy="room")
     */
    private $configurateurPngMasks;

    /**
     * @ORM\OneToMany(targetEntity=ConfigurateurPngMaskFloor::class, mappedBy="room")
     */
    private $configurateurPngMaskFloors;

    /**
     * @ORM\OneToMany(targetEntity=ConfigurateurPngProcess::class, mappedBy="room")
     */
    private $configurateurPngProcesses;

    public function __construct()
    {
        $this->configurateurPngMasks = new ArrayCollection();
        $this->configurateurPngMaskFloors = new ArrayCollection();
        $this->configurateurPngProcesses = new ArrayCollection();
    }


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set path.
     *
     * @param string $path
     *
     * @return ConfigurateurPngOriginal
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return ConfigurateurPngOriginal
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set position.
     *
     * @param int $position
     *
     * @return ConfigurateurPngOriginal
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @return Collection<int, ConfigurateurPngMask>
     */
    public function getConfigurateurPngMasks(): Collection
    {
        return $this->configurateurPngMasks;
    }

    public function addConfigurateurPngMask(ConfigurateurPngMask $configurateurPngMask): self
    {
        if (!$this->configurateurPngMasks->contains($configurateurPngMask)) {
            $this->configurateurPngMasks[] = $configurateurPngMask;
            $configurateurPngMask->setRoom($this);
        }

        return $this;
    }

    public function removeConfigurateurPngMask(ConfigurateurPngMask $configurateurPngMask): self
    {
        if ($this->configurateurPngMasks->removeElement($configurateurPngMask)) {
            // set the owning side to null (unless already changed)
            if ($configurateurPngMask->getRoom() === $this) {
                $configurateurPngMask->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ConfigurateurPngMaskFloor>
     */
    public function getConfigurateurPngMaskFloors(): Collection
    {
        return $this->configurateurPngMaskFloors;
    }

    public function addConfigurateurPngMaskFloor(ConfigurateurPngMaskFloor $configurateurPngMaskFloor): self
    {
        if (!$this->configurateurPngMaskFloors->contains($configurateurPngMaskFloor)) {
            $this->configurateurPngMaskFloors[] = $configurateurPngMaskFloor;
            $configurateurPngMaskFloor->setRoom($this);
        }

        return $this;
    }

    public function removeConfigurateurPngMaskFloor(ConfigurateurPngMaskFloor $configurateurPngMaskFloor): self
    {
        if ($this->configurateurPngMaskFloors->removeElement($configurateurPngMaskFloor)) {
            // set the owning side to null (unless already changed)
            if ($configurateurPngMaskFloor->getRoom() === $this) {
                $configurateurPngMaskFloor->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ConfigurateurPngProcess>
     */
    public function getConfigurateurPngProcesses(): Collection
    {
        return $this->configurateurPngProcesses;
    }

    public function addConfigurateurPngProcess(ConfigurateurPngProcess $configurateurPngProcess): self
    {
        if (!$this->configurateurPngProcesses->contains($configurateurPngProcess)) {
            $this->configurateurPngProcesses[] = $configurateurPngProcess;
            $configurateurPngProcess->setRoom($this);
        }

        return $this;
    }

    public function removeConfigurateurPngProcess(ConfigurateurPngProcess $configurateurPngProcess): self
    {
        if ($this->configurateurPngProcesses->removeElement($configurateurPngProcess)) {
            // set the owning side to null (unless already changed)
            if ($configurateurPngProcess->getRoom() === $this) {
                $configurateurPngProcess->setRoom(null);
            }
        }

        return $this;
    }
}
