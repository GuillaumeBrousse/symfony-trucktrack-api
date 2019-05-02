<?php

namespace AppBundle\Entity;

/**
 * Destinataire
 */
class Destinataire
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
     * @var string
     */
    private $address;

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
     * Set name
     *
     * @param string $name
     *
     * @return Destinataire
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
     * Set address
     *
     * @param string $address
     *
     * @return Destinataire
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set detailsMission
     *
     * @param \AppBundle\Entity\DetailsMission $detailsMission
     * @return Destinataire
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
     * Constructor
     */
    public function __construct()
    {
        $this->detailsMission = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add detailsMission
     *
     * @param \AppBundle\Entity\DetailsMission $detailsMission
     *
     * @return Destinataire
     */
    public function addDetailsMission(\AppBundle\Entity\DetailsMission $detailsMission)
    {
        $this->detailsMission[] = $detailsMission;

        return $this;
    }

    /**
     * Remove detailsMission
     *
     * @param \AppBundle\Entity\DetailsMission $detailsMission
     */
    public function removeDetailsMission(\AppBundle\Entity\DetailsMission $detailsMission)
    {
        $this->detailsMission->removeElement($detailsMission);
    }
}
