<?php

namespace AppBundle\Entity;

/**
 * Tracks
 */
class Tracks
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var \DateTime
     */
    private $created;


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
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Tracks
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Tracks
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Tracks
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
    /**
     * @var \AppBundle\Entity\SuiviMission
     */
    private $suiviMission;


    /**
     * Set suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Tracks
     */
    public function setSuiviMission(\AppBundle\Entity\SuiviMission $suiviMission = null)
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
}
