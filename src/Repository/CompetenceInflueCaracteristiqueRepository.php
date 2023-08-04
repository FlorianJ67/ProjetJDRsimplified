<?php

namespace App\Repository;

use App\Entity\CompetenceInflueCaracteristique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompetenceInflueCaracteristique>
 *
 * @method CompetenceInflueCaracteristique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetenceInflueCaracteristique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetenceInflueCaracteristique[]    findAll()
 * @method CompetenceInflueCaracteristique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetenceInflueCaracteristiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetenceInflueCaracteristique::class);
    }

//    /**
//     * @return CompetenceInflueCaracteristique[] Returns an array of CompetenceInflueCaracteristique objects
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

//    public function findOneBySomeField($value): ?CompetenceInflueCaracteristique
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
