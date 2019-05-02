<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Chauffeur;

/**
 * MissionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MissionRepository extends \Doctrine\ORM\EntityRepository
{


	public function getAllMissionsByChauffeur(Chauffeur $chauffeur)
	{	
		return $this->createQueryBuilder('m')
			->leftJoin('m.suiviMission', 'sm')
			->leftJoin('sm.chauffeur', 'ch')
			->select('m, sm, ch')
			->where('ch = :chauffeur')->setParameter('chauffeur', $chauffeur)
			->orderBy('m.date', 'DESC')
			->getQuery()
			->getResult();

	}

	public function getOneMissionByChauffeur($id, Chauffeur $chauffeur)
	{
		return $this->createQueryBuilder('m')
			->leftJoin('m.suiviMission', 'sm')
			->leftJoin('sm.chauffeur', 'ch')
			->select('m, sm, ch')
			->where('ch = :chauffeur')->setParameter('chauffeur', $chauffeur)
			->andWhere('m.id = :id')->setParameter('id', $id)
			->getQuery()
			->getOneOrNullResult();
	}

	public function getActiveMissionByChauffeur(Chauffeur $chauffeur)
	{
		return $this->createQueryBuilder('m')
			->leftJoin('m.suiviMission', 'sm')
			->leftJoin('sm.chauffeur', 'ch')
			->leftJoin('m.state', 's')
			->select('m, sm, ch')
			->where('ch = :chauffeur')->setParameter('chauffeur', $chauffeur)
			->andWhere('s.id = 2')
			->setMaxResults(1)
			->getQuery()
			->getOneOrNullResult();
	}

}