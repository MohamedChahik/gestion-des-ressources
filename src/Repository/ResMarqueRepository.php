<?php

namespace App\Repository;

use App\Entity\ResMarque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResMarque|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResMarque|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResMarque[]    findAll()
 * @method ResMarque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResMarqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResMarque::class);
    }

    // /**
    //  * @return ResMarque[] Returns an array of ResMarque objects
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
    public function findOneBySomeField($value): ?ResMarque
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
