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
    public function findValide($nbr = 3)
    {
        $qb = $this->createQueryBuilder('i')
                ->join('i.statut', 's')
                ->where('s.nom = :statut')
                ->setParameter('statut', 'Valide')
                ->orderBy('i.date', 'desc');

        $qb->setMaxResults($nbr);

        return $qb->getQuery()->getResult();
    }

}
