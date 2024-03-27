<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigurateurConfigurateurPngMaskFloor
 *
 * @ORM\Table(name="configurateur_png_mask_floor")
 * @ORM\Entity(repositoryClass=ConfigurateurPngMaskFloorRepository::class)
 */
class ConfigurateurPngMaskFloor
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
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var string
     * 
     * @ORM\Column(name="pattern", type="string")
     */
    private $pattern;

    /**
     * @ORM\ManyToOne(targetEntity=ConfigurateurPngOriginal::class, inversedBy="configurateurPngMaskFloors")
     */
    private $room;



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
     * @return ConfigurateurPngMaskFloor
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
     * Set type.
     *
     * @param string $type
     *
     * @return ConfigurateurPngMaskFloor
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set pattern.
     *
     * @param string $pattern
     *
     * @return ConfigurateurPngMaskFloor
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * Get pattern.
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    public function getRoom(): ?ConfigurateurPngOriginal
    {
        return $this->room;
    }

    public function setRoom(?ConfigurateurPngOriginal $room): self
    {
        $this->room = $room;

        return $this;
    }



}
