<?php

namespace App\Repository;

use App\Entity\EntryFood;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EntryFood|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntryFood|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntryFood[]    findAll()
 * @method EntryFood[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntryFoodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntryFood::class);
    }

    // /**
    //  * @return EntryFood[] Returns an array of EntryFood objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EntryFood
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
