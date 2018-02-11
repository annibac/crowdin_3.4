<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Entity\User;

/**
 * Languages
 *
 * @ORM\Table(name="language")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LanguagesRepository")
 */
class Language
{
    public function __construct() {
        $this->users = new ArrayCollection();
        $this->targetFiles = new ArrayCollection();
        $this->values = new ArrayCollection();
    }

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
     * @ORM\Column(name="shortName", type="string", length=100)
     */
    private $shortName;

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", inversedBy="languages")
     * @ORM\JoinTable(name="user_languages")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="FileBundle\Entity\File", inversedBy="targetLanguages")
     * @ORM\JoinTable(name="file_target_languages")
     */
    private $targetFiles;

    /**
     * @ORM\OneToMany(targetEntity="FileBundle\Entity\Value", mappedBy="language")
     */
    private $values;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Language
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return Language
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param mixed $users
     * @return Language
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetFiles()
    {
        return $this->targetFiles;
    }

    /**
     * @param mixed $targetFiles
     * @return Language
     */
    public function setTargetFiles($targetFiles)
    {
        $this->targetFiles = $targetFiles;
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
     * @return Language
     */
    public function setValues($values)
    {
        $this->values = $values;
        return $this;
    }
}

