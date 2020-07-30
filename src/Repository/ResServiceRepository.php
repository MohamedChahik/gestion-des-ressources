<?php

namespace App\Repository;

use App\Entity\ResService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResService[]    findAll()
 * @method ResService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResService::class);
    }

    // /**
    //  * @return ResMateriel[] Returns an array of ResMateriel objects
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
    public function findOneBySomeField($value): ?ResMateriel
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
