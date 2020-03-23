<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hero
 *
 * @ORM\Table(name="heroes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HeroRepository")
 */
class Hero
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
     * @var int
     *
     * @ORM\Column(name="workId", type="integer")
     */
    private $workId;

    /**
     * @var Work
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Work", inversedBy="heroes")
     * @ORM\JoinColumn(name="workId", referencedColumnName="id")
     */
    private $work;






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
     * @return Hero
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
     * @return Work
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * @param Work $work
     */
    public function setWork($work)
    {
        $this->work = $work;
    }

    /**
     * @return int
     */
    public function getWorkId()
    {
        return $this->workId;
    }

    /**
     * @param int $workId
     */
    public function setWorkId($workId)
    {
        $this->workId = $workId;
    }
}

