<?php

namespace App\Repository;

use App\Entity\ResTypeService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResTypeService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResTypeService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResTypeService[]    findAll()
 * @method ResTypeService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResTypeServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResTypeService::class);
    }

    // /**
    //  * @return ResTypeService[] Returns an array of ResTypeService objects
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
    public function findOneBySomeField($value): ?ResTypeService
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
