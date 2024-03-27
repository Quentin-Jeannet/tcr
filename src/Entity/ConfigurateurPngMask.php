<?php
namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigurateurPngMask
 *
 * @ORM\Table(name="configurateur_png_mask")
 * @ORM\Entity(repositoryClass=ConfigurateurPngMaskRepository::class)
 */
class ConfigurateurPngMask
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
     * @var int
     * 
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=ConfigurateurPngOriginal::class, inversedBy="configurateurPngMasks")
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
     * @return ConfigurateurPngMask
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
     * @return ConfigurateurPngMask
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
     * Set position.
     *
     * @param int $position
     *
     * @return ConfigurateurPngMask
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
