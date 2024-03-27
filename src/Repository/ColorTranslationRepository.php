<?php

namespace App\Repository;

use App\Entity\ColorTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ColorTranslation>
 *
 * @method ColorTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorTranslation[]    findAll()
 * @method ColorTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ColorTranslation $entity, bool $flush = false): void
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
    public function remove(ColorTranslation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getColorDetail($color, $locale): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.color = :val')
            ->andWhere('c.lang = :val2')
            ->setParameter('val', $color)
            ->setParameter('val2', $locale)
            ->getQuery()
            ->getResult()
        ;
    }
//    /**
//     * @return ColorTranslation[] Returns an array of ColorTranslation objects
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

//    public function findOneBySomeField($value): ?ColorTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
