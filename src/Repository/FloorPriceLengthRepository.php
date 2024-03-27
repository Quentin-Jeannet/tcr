<?php

namespace App\Repository;

use App\Entity\FloorPriceLength;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FloorPriceLength>
 *
 * @method FloorPriceLength|null find($id, $lockMode = null, $lockVersion = null)
 * @method FloorPriceLength|null findOneBy(array $criteria, array $orderBy = null)
 * @method FloorPriceLength[]    findAll()
 * @method FloorPriceLength[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloorPriceLengthRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FloorPriceLength::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FloorPriceLength $entity, bool $flush = false): void
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
    public function remove(FloorPriceLength $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return FloorPriceLength[] Returns an array of FloorPriceLength objects
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

//    public function findOneBySomeField($value): ?FloorPriceLength
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
