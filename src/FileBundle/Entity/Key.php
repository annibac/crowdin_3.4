<?php

namespace FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Source
 *
 * @ORM\Table(name="content")
 * @ORM\Entity(repositoryClass="FileBundle\Repository\ContentRepository")
 */
class Key
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
     * @ORM\ManyToOne(targetEntity="FileBundle\Entity\File", inversedBy="keys", cascade={"persist"})
     * @ORM\JoinColumn(name="file_id", referencedColumnName="id")
     */
    private $file;

    /**
     * @ORM\OneToMany(targetEntity="FileBundle\Entity\Value", mappedBy="key")
     */
    private $values;

    public function __construct() {
        $this->values = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     * @return Key
     */
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @param mixed $values
     */
    public function setValues($values)
    {
        $this->values = $values;
    }

    public function addFile(Value $value) {
        $this->values[] = $value;
    }

    public function addValue($value)
    {
        $this->getValues()->add($value);
    }

}
