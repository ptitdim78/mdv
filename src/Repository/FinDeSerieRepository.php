<?php

namespace App\Repository;

use App\Entity\FinDeSerie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FinDeSerie|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinDeSerie|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinDeSerie[]    findAll()
 * @method FinDeSerie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinDeSerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinDeSerie::class);
    }

    // /**
    //  * @return FinDeSerie[] Returns an array of FinDeSerie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FinDeSerie
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
