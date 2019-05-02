<?php

namespace AppBundle\Entity;

/**
 * Cargaison
 */
class Cargaison
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
     * @var string
     */
    private $code;

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
     * @return Cargaison
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
     * Set code
     *
     * @param string $code
     *
     * @return Cargaison
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set detailsMission
     *
     * @param \AppBundle\Entity\DetailsMission $detailsMission
     * @return Cargaison
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
     * @return Cargaison
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
