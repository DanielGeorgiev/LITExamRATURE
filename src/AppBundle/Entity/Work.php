<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 *
 * @ORM\Table(name="works")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkRepository")
 */
class Work
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="infoSource", type="string", length=255)
     */
    private $infoSource;

    /**
     * @var int
     *
     * @ORM\Column(name="creationYear", type="integer")
     */
    private $creationYear;

    /**
     * @var int
     *
     * @ORM\Column(name="genreId", type="integer")
     */
    private $genreId;

    /**
     * @var Genre
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Genre", inversedBy="works")
     * @ORM\JoinColumn(name="genreId", referencedColumnName="id")
     */
    private $genre;

    /**
     * @var int
     *
     * @ORM\Column(name="authorId", type="integer")
     */
    private $authorId;

    /**
     * @var Author
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Author", inversedBy="works")
     * @ORM\JoinColumn(name="authorId", referencedColumnName="id")
     */
    private $author;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Hero", mappedBy="work")
     */
    private $heroes;





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
     * @return Work
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
     * Set infoSource
     *
     * @param string $infoSource
     *
     * @return Work
     */
    public function setInfoSource($infoSource)
    {
        $this->infoSource = $infoSource;

        return $this;
    }

    /**
     * Get infoSource
     *
     * @return string
     */
    public function getInfoSource()
    {
        return $this->infoSource;
    }

    /**
     * Set creationYear
     *
     * @param integer $creationYear
     *
     * @return Work
     */
    public function setCreationYear($creationYear)
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * Get creationYear
     *
     * @return int
     */
    public function getCreationYear()
    {
        return $this->creationYear;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param Genre $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return ArrayCollection
     */
    public function getHeroes()
    {
        return $this->heroes;
    }

    /**
     * @param ArrayCollection $heroes
     */
    public function setHeroes($heroes)
    {
        $this->heroes = $heroes;
    }
}

