<?php

namespace App\Repository;

use App\Entity\ResDemande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ResDemande|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResDemande|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResDemande[]    findAll()
 * @method ResDemande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResDemandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResDemande::class);
    }

    // /**
    //  * @return ResDemande[] Returns an array of ResDemande objects
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
    public function findOneBySomeField($value): ?ResDemande
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
