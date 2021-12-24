<?php

namespace App\Repository;

use App\Entity\SlotTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SlotTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method SlotTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method SlotTime[]    findAll()
 * @method SlotTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlotTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SlotTime::class);
    }

    // /**
    //  * @return SlotTime[] Returns an array of SlotTime objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SlotTime
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
