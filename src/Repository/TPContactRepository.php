<?php

namespace App\Repository;

use App\Entity\TPContact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TPContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method TPContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method TPContact[]    findAll()
 * @method TPContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TPContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TPContact::class);
    }

    // /**
    //  * @return TPContact[] Returns an array of TPContact objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TPContact
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
