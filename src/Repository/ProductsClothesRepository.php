<?php

namespace App\Repository;

use App\Entity\ProductsClothes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductsClothes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductsClothes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductsClothes[]    findAll()
 * @method ProductsClothes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductsClothesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductsClothes::class);
    }

    // /**
    //  * @return ProductsClothes[] Returns an array of ProductsClothes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductsClothes
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
