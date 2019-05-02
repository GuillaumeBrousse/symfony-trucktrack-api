<?php

namespace AppBundle\Entity;

/**
 * SuiviMission
 */
class SuiviMission
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $vMax;

    /**
     * @var int
     */
    private $vMoy;

    /**
     * @var \AppBundle\Entity\Chauffeur
     */
    private $chauffeur;

    /**
     * @var \AppBundle\Entity\Vehicule
     */
    private $vehicule;

    /**
     * @var \AppBundle\Entity\Rracks
     */
    private $tracks;

    /**
     * @var \AppBundle\Entity\Mission
     */
    private $mission;



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
     * Set vMax
     *
     * @param integer $vMax
     *
     * @return SuiviMission
     */
    public function setVMax($vMax)
    {
        $this->vMax = $vMax;

        return $this;
    }

    /**
     * Get vMax
     *
     * @return int
     */
    public function getVMax()
    {
        return $this->vMax;
    }

    /**
     * Set vMoy
     *
     * @param integer $vMoy
     *
     * @return SuiviMission
     */
    public function setVMoy($vMoy)
    {
        $this->vMoy = $vMoy;

        return $this;
    }

    /**
     * Get vMoy
     *
     * @return int
     */
    public function getVMoy()
    {
        return $this->vMoy;
    }

    /**
     * Set chauffeur
     *
     * @param \AppBundle\Entity\Chauffeur $chauffeur
     * @return SuiviMission
     */
    public function setChauffeur(\AppBundle\Entity\Chauffeur $chauffeur = null)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return \AppBundle\Entity\Chauffeur 
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Set vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     * @return SuiviMission
     */
    public function setVehicule(\AppBundle\Entity\Vehicule $vehicule = null)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return \AppBundle\Entity\Vehicule 
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set tracks
     *
     * @param \AppBundle\Entity\Tracks $tracks
     * @return SuiviMission
     */
    public function setTracks(\AppBundle\Entity\Tracks $tracks = null)
    {
        $this->tracks = $tracks;

        return $this;
    }

    /**
     * Get tracks
     *
     * @return \AppBundle\Entity\Tracks 
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * Set mission
     *
     * @param \AppBundle\Entity\Mission $mission
     * @return SuiviMission
     */
    public function setMission(\AppBundle\Entity\Mission $mission = null)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return \AppBundle\Entity\Mission 
     */
    public function getMission()
    {
        return $this->mission;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tracks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add track
     *
     * @param \AppBundle\Entity\Tracks $track
     *
     * @return SuiviMission
     */
    public function addTrack(\AppBundle\Entity\Tracks $track)
    {
        $this->tracks[] = $track;

        return $this;
    }

    /**
     * Remove track
     *
     * @param \AppBundle\Entity\Tracks $track
     */
    public function removeTrack(\AppBundle\Entity\Tracks $track)
    {
        $this->tracks->removeElement($track);
    }
    /**
     * @var \AppBundle\Entity\Intervention
     */
    private $intervention;


    /**
     * Set intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return SuiviMission
     */
    public function setIntervention(\AppBundle\Entity\Intervention $intervention = null)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return \AppBundle\Entity\Intervention
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}
