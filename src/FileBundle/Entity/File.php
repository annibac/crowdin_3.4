<?php

namespace FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * File
 *
 * @ORM\Table(name="file")
 * @ORM\Entity(repositoryClass="FileBundle\Repository\FileRepository")
 */
class File
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="primary_lang", type="string", length=100)
     */
    private $primaryLang;

    /**
     * @var array
     *
     * @ORM\Column(name="target_lang", type="simple_array")
     */
    private $targetLang;


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
     * Set name
     *
     * @param string $name
     *
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set primaryLang
     *
     * @param string $primaryLang
     *
     * @return File
     */
    public function setPrimaryLang($primaryLang)
    {
        $this->primaryLang = $primaryLang;

        return $this;
    }

    /**
     * Get primaryLang
     *
     * @return string
     */
    public function getPrimaryLang()
    {
        return $this->primaryLang;
    }

    /**
     * Set targetLang
     *
     * @param array $targetLang
     *
     * @return File
     */
    public function setTargetLang($targetLang)
    {
        $this->targetLang = $targetLang;

        return $this;
    }

    /**
     * Get targetLang
     *
     * @return array
     */
    public function getTargetLang()
    {
        return $this->targetLang;
    }
}

