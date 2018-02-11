<?php

namespace FileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Value
 *
 * @ORM\Table(name="value")
 * @ORM\Entity(repositoryClass="FileBundle\Repository\ValueRepository")
 */
class Value
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
     * @ORM\ManyToOne(targetEntity="FileBundle\Entity\Key", inversedBy="values")
     * @ORM\JoinColumn(name="key_id", referencedColumnName="id")
     */
    private $key;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="values")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Language", inversedBy="values")
     * @ORM\JoinColumn(name="language_id", referencedColumnName="id")
     */
    private $language;

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
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return Value
     */
    public function setKey($key)
    {
        $this->key = $key;
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
     * @return Value
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param mixed $language
     * @return Value
     */
    public function setLanguage($language)
    {
        $this->language = $language;
        return $this;
    }
}

