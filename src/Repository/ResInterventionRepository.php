<?php

namespace App\Repository;

use App\Entity\ResIntervention;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResIntervention|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResIntervention|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResIntervention[]    findAll()
 * @method ResIntervention[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResInterventionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResIntervention::class);
    }

    // /**
    //  * @return ResIntervention[] Returns an array of ResIntervention objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResIntervention
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
