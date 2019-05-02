<?php

namespace AppBundle\Entity;

/**
 * Mission
 */
class Mission
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bigint
     */
    private $tempsReel;

    /**
     * @var bigint
     */
    private $tempsEstime;

    /**
     * @var \AppBundle\Entity\DetailsMission
     */
    private $detailsMission;


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
     * Set description
     *
     * @param string $description
     *
     * @return Mission
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
     * Set tempsReel
     *
     * @param bigint $tempsReel
     *
     * @return Mission
     */
    public function setTempsReel($tempsReel)
    {
        $this->tempsReel = $tempsReel;

        return $this;
    }

    /**
     * Get tempsReel
     *
     * @return bigint
     */
    public function getTempsReel()
    {
        return $this->tempsReel;
    }

    /**
     * Set tempsEstime
     *
     * @param bigint $tempsEstime
     *
     * @return Mission
     */
    public function setTempsEstime($tempsEstime)
    {
        $this->tempsEstime = $tempsEstime;

        return $this;
    }

    /**
     * Get tempsEstime
     *
     * @return bigint
     */
    public function getTempsEstime()
    {
        return $this->tempsEstime;
    }

    /**
     * Set detailsMission
     *
     * @param \AppBundle\Entity\DetailsMission $detailsMission
     * @return Mission
     */
    public function setDetailsMission(\AppBundle\Entity\DetailsMission $detailsMission = null)
    {
        $this->detailsMission = $detailsMission;

        return $this;
    }

    /**
     * Get detailsMission
     *
     * @return \AppBundle\Entity\DetailsMission 
     */
    public function getDetailsMission()
    {
        return $this->detailsMission;
    }
    /**
     * @var \AppBundle\Entity\SuiviMission
     */
    private $suiviMission;

    /**
     * @var \AppBundle\Entity\Client
     */
    private $client;


    /**
     * Set suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Mission
     */
    public function setSuiviMission(\AppBundle\Entity\SuiviMission $suiviMission)
    {
        $this->suiviMission = $suiviMission;

        return $this;
    }

    /**
     * Get suiviMission
     *
     * @return \AppBundle\Entity\SuiviMission
     */
    public function getSuiviMission()
    {
        return $this->suiviMission;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Mission
     */
    public function setClient(\AppBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * @var \DateTime
     */
    private $date;


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Mission
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    public function getChauffeur()
    {
        return $this->suiviMission->getChauffeur();
    }
    /**
     * @var boolean
     */
    private $state;


    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return Mission
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return boolean
     */
    public function getState()
    {
        return $this->state;
    }
}
