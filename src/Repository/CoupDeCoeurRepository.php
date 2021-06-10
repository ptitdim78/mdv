<?php

namespace App\Repository;

use App\Entity\CoupDeCoeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoupDeCoeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoupDeCoeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoupDeCoeur[]    findAll()
 * @method CoupDeCoeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoupDeCoeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoupDeCoeur::class);
    }

    // /**
    //  * @return CoupDeCoeur[] Returns an array of CoupDeCoeur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoupDeCoeur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
