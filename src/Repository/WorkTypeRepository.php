<?php

namespace App\Repository;

use App\Entity\WorkType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WorkType|null find($id, $lockMode = null, $lockVersion = null)
 * @method WorkType|null findOneBy(array $criteria, array $orderBy = null)
 * @method WorkType[]    findAll()
 * @method WorkType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WorkTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WorkType::class);
    }

    // /**
    //  * @return WorkType[] Returns an array of WorkType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WorkType
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
