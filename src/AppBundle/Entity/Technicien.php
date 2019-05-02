<?php

namespace AppBundle\Entity;

/**
 * Technicien
 */
class Technicien
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
     * @return Technicien
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
     * @return Technicien
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $intervention;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->intervention = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return Technicien
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
     * Get intervention
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIntervention()
    {
        return $this->intervention;
    }
}
