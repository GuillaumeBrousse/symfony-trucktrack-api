<?php

namespace AppBundle\Entity;

/**
 * Vehicule
 */
class Vehicule
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $immatriculation;

    /**
     * @var int
     */
    private $compteurKm;

    /**
     * @var bool
     */
    private $state;


    /**
     * @var bool
     */
    private $intervention;

    /**
     * @var \DateTime
     */
    private $assurance;

    /**
     * @var \DateTime
     */
    private $ct;


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
     * Set immatriculation
     *
     * @param string $immatriculation
     *
     * @return Vehicule
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    /**
     * Get immatriculation
     *
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * Set compteurKm
     *
     * @param integer $compteurKm
     *
     * @return Vehicule
     */
    public function setCompteurKm($compteurKm)
    {
        $this->compteurKm = $compteurKm;

        return $this;
    }

    /**
     * Get compteurKm
     *
     * @return int
     */
    public function getCompteurKm()
    {
        return $this->compteurKm;
    }

    /**
     * Set state
     *
     * @param boolean $state
     *
     * @return Vehicule
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return bool
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set intervention
     *
     * @param boolean $intervention
     *
     * @return Vehicule
     */
    public function setIntervention($intervention)
    {
        $this->intervention = $intervention;

        return $this;
    }

    /**
     * Get intervention
     *
     * @return bool
     */
    public function getIntervention()
    {
        return $this->intervention;
    }

    /**
     * Set assurance
     *
     * @param \DateTime $assurance
     *
     * @return Vehicule
     */
    public function setAssurance($assurance)
    {
        $this->assurance = $assurance;

        return $this;
    }

    /**
     * Get assurance
     *
     * @return \DateTime
     */
    public function getAssurance()
    {
        return $this->assurance;
    }

    /**
     * Set ct
     *
     * @param \DateTime $ct
     *
     * @return Vehicule
     */
    public function setCt($ct)
    {
        $this->ct = $ct;

        return $this;
    }

    /**
     * Get ct
     *
     * @return \DateTime
     */
    public function getCt()
    {
        return $this->ct;
    }
    /**
     * @var \AppBundle\Entity\Client
     */
    private $client;


    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Vehicule
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
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
     * @var \AppBundle\Entity\suiviMission
     */
    private $suiviMission;


    /**
     * Set suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Vehicule
     */
    public function setSuiviMission(\AppBundle\Entity\suiviMission $suiviMission = null)
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
     * @var boolean
     */
    private $isIntervention;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->intervention = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set isIntervention
     *
     * @param boolean $isIntervention
     *
     * @return Vehicule
     */
    public function setIsIntervention($isIntervention)
    {
        $this->isIntervention = $isIntervention;

        return $this;
    }

    /**
     * Get isIntervention
     *
     * @return boolean
     */
    public function getIsIntervention()
    {
        return $this->isIntervention;
    }

    /**
     * Add intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return Vehicule
     */
    public function addIntervention(\AppBundle\Entity\Intervention $intervention)
    {
        $this->intervention[] = $intervention;

        return $this;
    }

    /**
     * Remove intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     */
    public function removeIntervention(\AppBundle\Entity\Intervention $intervention)
    {
        $this->intervention->removeElement($intervention);
    }
    /**
     * @var \AppBundle\Entity\TypeVehicule
     */
    private $typeVehicule;


    /**
     * Set typeVehicule
     *
     * @param \AppBundle\Entity\TypeVehicule $typeVehicule
     *
     * @return Vehicule
     */
    public function setTypeVehicule(\AppBundle\Entity\TypeVehicule $typeVehicule = null)
    {
        $this->typeVehicule = $typeVehicule;

        return $this;
    }

    /**
     * Get typeVehicule
     *
     * @return \AppBundle\Entity\TypeVehicule
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }

    /**
     * Add suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Vehicule
     */
    public function addSuiviMission(\AppBundle\Entity\SuiviMission $suiviMission)
    {
        $this->suiviMission[] = $suiviMission;

        return $this;
    }

    /**
     * Remove suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     */
    public function removeSuiviMission(\AppBundle\Entity\SuiviMission $suiviMission)
    {
        $this->suiviMission->removeElement($suiviMission);
    }
}
