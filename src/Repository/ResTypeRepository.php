<?php

namespace App\Repository;

use App\Entity\ResType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResType[]    findAll()
 * @method ResType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResType::class);
    }

    // /**
    //  * @return ResType[] Returns an array of ResType objects
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
    public function findOneBySomeField($value): ?ResType
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
