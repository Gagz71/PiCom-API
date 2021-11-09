<?php

namespace App\Repository;

use App\Entity\HtmlAdvert;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HtmlAdvert|null find($id, $lockMode = null, $lockVersion = null)
 * @method HtmlAdvert|null findOneBy(array $criteria, array $orderBy = null)
 * @method HtmlAdvert[]    findAll()
 * @method HtmlAdvert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HtmlAdvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HtmlAdvert::class);
    }

    // /**
    //  * @return HtmlAdvert[] Returns an array of HtmlAdvert objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HtmlAdvert
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
