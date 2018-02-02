<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=100)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100)
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="birth_year", type="integer")
     */
    protected $birthYear;

    /**
     * @var array
     *
     * @ORM\Column(name="lang", type="simple_array")
     */
    protected $lang;

    /**
     * @var int
     *
     * @ORM\Column(name="malus", type="integer")
     */
    protected $malus;


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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set birthYear
     *
     * @param integer $birthYear
     *
     * @return User
     */
    public function setBirthYear($birthYear)
    {
        $this->birthYear = $birthYear;

        return $this;
    }

    /**
     * Get birthYear
     *
     * @return int
     */
    public function getBirthYear()
    {
        return $this->birthYear;
    }

    /**
     * Set lang
     *
     * @param array $lang
     *
     * @return User
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return array
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set malus
     *
     * @param integer $malus
     *
     * @return User
     */
    public function setMalus($malus)
    {
        $this->malus = $malus;

        return $this;
    }

    /**
     * Get malus
     *
     * @return int
     */
    public function getMalus()
    {
        return $this->malus;
    }
}

