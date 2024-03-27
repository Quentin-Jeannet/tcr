<?php

namespace App\Repository;

use App\Entity\ColorFamilyTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ColorFamilyTranslation>
 *
 * @method ColorFamilyTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorFamilyTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorFamilyTranslation[]    findAll()
 * @method ColorFamilyTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorFamilyTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorFamilyTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ColorFamilyTranslation $entity, bool $flush = false): void
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
    public function remove(ColorFamilyTranslation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function getColorFamilyTrans($category_id, $locale): array
    {
        return $this->createQueryBuilder('c')
               ->join('c.colorFamily', 'cf')
               ->join('cf.category', 'cat')
            ->andWhere('cat.id = :val2')
            ->andWhere('c.lang = :val4')
            ->setParameter('val2', $category_id)
            ->setParameter('val4', $locale)
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    public function getColorsByFamily($family_id): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.colorFamily', 'f')
            ->join('f.colors', 'cs')
            ->andWhere('f.id = :val4')
            ->setParameter('val4', $family_id)
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
  
//    /**
//     * @return ColorFamilyTranslation[] Returns an array of ColorFamilyTranslation objects
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

//    public function findOneBySomeField($value): ?ColorFamilyTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
