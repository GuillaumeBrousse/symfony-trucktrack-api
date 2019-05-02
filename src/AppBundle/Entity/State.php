<?php

namespace AppBundle\Entity;

/**
 * State
 */
class State
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


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
     * @return State
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $mission;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $intervention;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mission = new \Doctrine\Common\Collections\ArrayCollection();
        $this->intervention = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mission
     *
     * @param \AppBundle\Entity\Mission $mission
     *
     * @return State
     */
    public function addMission(\AppBundle\Entity\Mission $mission)
    {
        $this->mission[] = $mission;

        return $this;
    }

    /**
     * Remove mission
     *
     * @param \AppBundle\Entity\Mission $mission
     */
    public function removeMission(\AppBundle\Entity\Mission $mission)
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
     * Add intervention
     *
     * @param \AppBundle\Entity\Intervention $intervention
     *
     * @return State
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
