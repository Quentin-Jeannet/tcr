<?php
namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * ConfigurateurPngProcess
 *
 * @ORM\Table(name="configurateur_png_process")
 * @ORM\Entity(repositoryClass=ConfigurateurPngProcessRepository::class)
 */
class ConfigurateurPngProcess
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
     * @ORM\Column(name="elementQuantity", type="integer")
     */
    private $elementQuantity;

    /**
     * @ORM\ManyToOne(targetEntity=ConfigurateurPngOriginal::class, inversedBy="configurateurPngProcesses")
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
     * @return ConfigurateurPngProcess
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
     * @return ConfigurateurPngProcess
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
     * Set elementQuantity.
     *
     * @param int $elementQuantity
     *
     * @return ConfigurateurPngProcess
     */
    public function setElementQuantity($elementQuantity)
    {
        $this->elementQuantity = $elementQuantity;

        return $this;
    }

    /**
     * Get elementQuantity.
     *
     * @return int
     */
    public function getElementQuantity()
    {
        return $this->elementQuantity;
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
