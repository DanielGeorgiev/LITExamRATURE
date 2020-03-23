<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="authors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuthorRepository")
 */
class Author
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, unique=false)
     */
    private $picture;

    /**
     * @var int
     *
     * @ORM\Column(name="yearOfBirth", type="integer")
     */
    private $yearOfBirth;

    /**
     * @var int
     *
     * @ORM\Column(name="yearOfDeath", type="integer")
     */
    private $yearOfDeath;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Work", mappedBy="author")
     */
    private $works;







    public function _construct()
    {
        $this->setWorks([]);
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
     * @return Author
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
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Set yearOfBirth
     *
     * @param integer $yearOfBirth
     *
     * @return Author
     */
    public function setYearOfBirth($yearOfBirth)
    {
        $this->yearOfBirth = $yearOfBirth;

        return $this;
    }

    /**
     * Get yearOfBirth
     *
     * @return int
     */
    public function getYearOfBirth()
    {
        return $this->yearOfBirth;
    }

    /**
     * Set yearOfDeath
     *
     * @param integer $yearOfDeath
     *
     * @return Author
     */
    public function setYearOfDeath($yearOfDeath)
    {
        $this->yearOfDeath = $yearOfDeath;

        return $this;
    }

    /**
     * Get yearOfDeath
     *
     * @return int
     */
    public function getYearOfDeath()
    {
        return $this->yearOfDeath;
    }

    /**
     * @return ArrayCollection
     */
    public function getWorks()
    {
        return $this->works;
    }

    /**
     * @param ArrayCollection $works
     */
    public function setWorks($works)
    {
        $this->works = $works;
    }
}

