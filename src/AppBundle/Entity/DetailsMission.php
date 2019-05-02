<?php

namespace AppBundle\Entity;

/**
 * DetailsMission
 */
class DetailsMission
{
    /**
     * @var int
     */
    private $id;

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
     * Set mission
     *
     * @param \AppBundle\Entity\DetailsMission $mission
     * @return DetailsMission
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
     * @var \AppBundle\Entity\Destinataire
     */
    private $destinataire;

    /**
     * @var \AppBundle\Entity\Remettant
     */
    private $remettant;

    /**
     * @var \AppBundle\Entity\Cargaison
     */
    private $cargaison;


    /**
     * Set destinataire
     *
     * @param \AppBundle\Entity\Destinataire $destinataire
     *
     * @return DetailsMission
     */
    public function setDestinataire(\AppBundle\Entity\Destinataire $destinataire)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return \AppBundle\Entity\Destinataire
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }

    /**
     * Set remettant
     *
     * @param \AppBundle\Entity\Remettant $remettant
     *
     * @return DetailsMission
     */
    public function setRemettant(\AppBundle\Entity\Remettant $remettant)
    {
        $this->remettant = $remettant;

        return $this;
    }

    /**
     * Get remettant
     *
     * @return \AppBundle\Entity\Remettant
     */
    public function getRemettant()
    {
        return $this->remettant;
    }

    /**
     * Set cargaison
     *
     * @param \AppBundle\Entity\Cargaison $cargaison
     *
     * @return DetailsMission
     */
    public function setCargaison(\AppBundle\Entity\Cargaison $cargaison)
    {
        $this->cargaison = $cargaison;

        return $this;
    }

    /**
     * Get cargaison
     *
     * @return \AppBundle\Entity\Cargaison
     */
    public function getCargaison()
    {
        return $this->cargaison;
    }
}
