<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TableDatabase
 *
 * @ORM\Table(name="table_database")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\TableDatabaseRepository")
 */
class TableDatabase
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
     * @ORM\Column(name="Title", type="string", length=50, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="Pacient", type="string", length=50, nullable=true)
     */
    private $pacient;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="string", length=255)
     */
    private $info;
    /**
     * @var
     * @ORM\Column(name ="timecreate", type="datetime", nullable=false)
     * @ORM\Version
     */


    private $timecreate;

    /**
     * @return mixed
     */
    public function getTimecreate()
    {
        return $this->timecreate;
    }

    /**
     * @param mixed $timecreate
     */
    public function setTimecreate($timecreate)
    {
        $this->timecreate = $timecreate;

        return $this;
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
     * Set title
     *
     * @param string $title
     *
     * @return TableDatabase
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TableDatabase
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set pacient
     *
     * @param string $pacient
     *
     * @return TableDatabase
     */
    public function setPacient($pacient)
    {
        $this->pacient = $pacient;

        return $this;
    }

    /**
     * Get pacient
     *
     * @return string
     */
    public function getPacient()
    {
        return $this->pacient;
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return TableDatabase
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }
}

