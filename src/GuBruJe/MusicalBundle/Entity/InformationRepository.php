<?php

namespace GuBruJe\MusicalBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * InformationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InformationRepository extends EntityRepository
{
    public function findValideInformations()
    {
        $qb = $this->createQueryBuilder('i')
            ->join('i.statut','s')
        ->where('s.nom = :statut')
        ->setParameter('statut', 'Valide');

        return $qb->getQuery()->getResult();
    }

}
