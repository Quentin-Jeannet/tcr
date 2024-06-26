<?php

namespace App\Repository;

use App\Entity\FloorTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FloorTranslation>
 *
 * @method FloorTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method FloorTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method FloorTranslation[]    findAll()
 * @method FloorTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloorTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FloorTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FloorTranslation $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(FloorTranslation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return FloorTranslation[] Returns an array of FloorTranslation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FloorTranslation
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
