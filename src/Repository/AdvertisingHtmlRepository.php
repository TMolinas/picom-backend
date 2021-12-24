<?php

namespace App\Repository;

use App\Entity\AdvertisingHtml;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AdvertisingHtml|null find($id, $lockMode = null, $lockVersion = null)
 * @method AdvertisingHtml|null findOneBy(array $criteria, array $orderBy = null)
 * @method AdvertisingHtml[]    findAll()
 * @method AdvertisingHtml[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertisingHtmlRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AdvertisingHtml::class);
    }

    // /**
    //  * @return AdvertisingHtml[] Returns an array of AdvertisingHtml objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AdvertisingHtml
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
