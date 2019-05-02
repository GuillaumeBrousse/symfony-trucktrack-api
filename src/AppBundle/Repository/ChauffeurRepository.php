<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Client;

/**
 * ChauffeurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChauffeurRepository extends \Doctrine\ORM\EntityRepository
{


	public function getPositionChauffeursByClient(Client $client)
	{
		return $this->createQueryBuilder('c')
			->leftJoin('c.client', 'cl')
			->leftJoin('c.suiviMission', 'sm')
			->leftJoin('sm.mission', 'm')
			->leftJoin('m.state', 's')
			->leftJoin('sm.tracks', 't')
			->select('c', 'sm', 't', 'm', 's')
			->where('cl = :cl')->setParameter('cl', $client)
			->andWhere('s.id = 2')
			->getQuery()
            ->getResult();
	}


}