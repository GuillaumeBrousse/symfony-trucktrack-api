<?php

namespace AppBundle\Entity;

/**
 * TypeVehicule
 */
class TypeVehicule
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;


    public function __toString()
    {
        return $this->name;
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
     * @return TypeVehicule
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
    private $vehicule;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vehicule = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     *
     * @return TypeVehicule
     */
    public function addVehicule(\AppBundle\Entity\Vehicule $vehicule)
    {
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
}
