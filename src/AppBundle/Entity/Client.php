<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * Client
 */
class Client extends BaseClient
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $siren;

    /**
     * @var \AppBundle\Entity\User
     */
    protected $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $chauffeur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $mission;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $vehicule;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->chauffeur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->mission = new \Doctrine\Common\Collections\ArrayCollection();
        $this->vehicule = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->name. ' ('.$this->siren.')';
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
     * @return Client
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
     * Set siren
     *
     * @param string $siren
     *
     * @return Client
     */
    public function setSiren($siren)
    {
        $this->siren = $siren;

        return $this;
    }

    /**
     * Get siren
     *
     * @return string
     */
    public function getSiren()
    {
        return $this->siren;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Client
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add chauffeur
     *
     * @param \AppBundle\Entity\chauffeur $chauffeur
     * @return Client
     */
    public function addChauffeur(\AppBundle\Entity\Chauffeur $chauffeur)
    {
        $chauffeur->setClient($this);
        $this->chauffeur[] = $chauffeur;

        return $this;
    }

    /**
     * Remove chauffeur
     *
     * @param \AppBundle\Entity\chauffeur $chauffeur
     */
    public function removechauffeur(\AppBundle\Entity\Chauffeur $chauffeur)
    {
        $this->chauffeur->removeElement($chauffeur);
    }

    /**
     * Get chauffeur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * Set chauffeur
     *
     * @return Client
     */
    public function setChauffeur(ArrayCollection $chauffeurs)
    {
        foreach ($chauffeurs as $chauffeur) {
            $chauffeur->setClient($this);
        }

        $this->chauffeur = $chauffeurs;

    }

    /**
     * Add mission
     *
     * @param \AppBundle\Entity\Mission $mission
     * @return Client
     */
    public function addMission(\AppBundle\Entity\Mission $mission)
    {
        $mission->setClient($this);
        $this->mission[] = $mission;

        return $this;
    }

    /**
     * Remove mission
     *
     * @param \AppBundle\Entity\Mission $mission
     */
    public function removeMission(\AppBundle\Entity\mission $mission)
    {
        $this->mission->removeElement($mission);
    }

    /**
     * Get mission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set mission
     *
     * @return Client
     */
    public function setMission(ArrayCollection $missions)
    {
        foreach ($missions as $mission) {
            $mission->setClient($this);
        }

        $this->mission = $missions;

    }

    /**
     * Add vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     * @return Client
     */
    public function addVehicule(\AppBundle\Entity\Vehicule $vehicule)
    {
        $vehicule->setClient($this);
        $this->vehicule[] = $vehicule;

        return $this;
    }

    /**
     * Remove vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     */
    public function removeVehicule(\AppBundle\Entity\Vehicule $vehicule)
    {
        $this->vehicule->removeElement($vehicule);
    }

    /**
     * Get vehicule
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set vehicule
     *
     * @return Client
     */
    public function setVehicule(ArrayCollection $vehicules)
    {
        foreach ($vehicules as $vehicule) {
            $vehicule->setClient($this);
        }

        $this->vehicule = $vehicules;

    }

    /**
     * @var string
     */
    protected $app_name;

    /**
     * @var string
     */
    protected $description;


    /**
     * Set appName
     *
     * @param string $appName
     *
     * @return Client
     */
    public function setAppName($appName)
    {
        $this->app_name = $appName;

        return $this;
    }

    /**
     * Get appName
     *
     * @return string
     */
    public function getAppName()
    {
        return $this->app_name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Client
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

    public function getEmail()
    {
        return $this->user->getEmail();
    }

    public function getUsername()
    {
        return $this->user->getUsername();
    }
}
