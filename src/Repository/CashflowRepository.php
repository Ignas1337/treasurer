<?php

namespace App\Repository;

use App\Entity\Cashflow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cashflow>
 *
 * @method Cashflow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cashflow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cashflow[]    findAll()
 * @method Cashflow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CashflowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cashflow::class);
    }

//    /**
//     * @return Cashflow[] Returns an array of Cashflow objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cashflow
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
