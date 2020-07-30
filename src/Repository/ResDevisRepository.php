<?php

namespace App\Repository;

use App\Entity\ResDevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResDevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResDevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResDevis[]    findAll()
 * @method ResDevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResDevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResDevis::class);
    }

    // /**
    //  * @return ResDevis[] Returns an array of ResDevis objects
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
    public function findOneBySomeField($value): ?ResDevis
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
