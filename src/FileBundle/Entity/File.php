<?php

namespace FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\Column(type="string")
     * @Assert\File(mimeTypes={ "application/pdf" })
     *
     */
    private $file;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Language")
     * @ORM\JoinColumn(name="source_language_id", referencedColumnName="id")
     */
    private $sourceLanguage;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Language", mappedBy="targetFiles")
     */
    private $targetLanguages;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="files")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="FileBundle\Entity\Key", mappedBy="file")
     */
    private $keys;

    public function __construct() {
        $this->targetLanguages = new ArrayCollection();
        $this->keys = new ArrayCollection();
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
     * @return mixed
     */
    public function getSourceLanguage()
    {
        return $this->sourceLanguage;
    }

    /**
     * @param mixed $sourceLanguage
     * @return File
     */
    public function setSourceLanguage($sourceLanguage)
    {
        $this->sourceLanguage = $sourceLanguage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetLanguages()
    {
        return $this->targetLanguages;
    }

    /**
     * @param mixed $targetLanguages
     * @return File
     */
    public function setTargetLanguages($targetLanguages)
    {
        $this->targetLanguages = $targetLanguages;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return File
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * @param mixed $keys
     * @return File
     */
    public function setKeys($keys)
    {
        $this->keys = $keys;
        return $this;
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
     */
    public function setFile($file)
    {
        $this->file = $file;
    }
}

