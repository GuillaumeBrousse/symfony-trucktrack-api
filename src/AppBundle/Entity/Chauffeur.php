<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Chauffeur
 */
class Chauffeur
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $permis;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $suiviMission;


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
     * @return Chauffeur
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
     * @return Chauffeur
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
     * Set permis
     *
     * @param string $permis
     *
     * @return Chauffeur
     */
    public function setPermis($permis)
    {
        $this->permis = $permis;

        return $this;
    }

    /**
     * Get permis
     *
     * @return string
     */
    public function getPermis()
    {
        return $this->permis;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Chauffeur
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
     * @var \AppBundle\Entity\Client
     */
    private $client;


    /**
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Chauffeur
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
     * Set suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Chauffeur
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->suiviMission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add suiviMission
     *
     * @param \AppBundle\Entity\SuiviMission $suiviMission
     *
     * @return Chauffeur
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

    public function getEmail()
    {
        return $this->user->getEmail();
    }

    public function getUsername()
    {
        return $this->user->getUsername();
    }

    public function getPosition()
    {   
        if($this->suiviMission->last())
            return $this->suiviMission->last()->getTracks()->last();
        else
            return null;
    }
}
