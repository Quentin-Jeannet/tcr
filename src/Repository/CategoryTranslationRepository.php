<?php

namespace App\Repository;

use App\Entity\CategoryTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryTranslation>
 *
 * @method CategoryTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryTranslation[]    findAll()
 * @method CategoryTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CategoryTranslation $entity, bool $flush = false): void
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
    public function remove(CategoryTranslation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getCatHome($id_home, $locale): array
    {
        return $this->createQueryBuilder('c')
               ->join('c.category', 'cat')
            ->andWhere('cat.id = :val2')
            ->andWhere('c.lang = :val4')
            ->setParameter('val2', $id_home)
            ->setParameter('val4', $locale)
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getCategorieExceptHome($id_home, $locale): array
    {
        return $this->createQueryBuilder('c')
               ->join('c.category', 'cat')
            ->andWhere('cat.id != :val2')
            ->andWhere('c.lang = :val4')
            ->setParameter('val2', $id_home)
            ->setParameter('val4', $locale)
            ->orderBy('cat.priority', 'ASC')
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getCategorySlugUrl($old_category_id, $locale): array
    {
        return $this->createQueryBuilder('c')
               ->join('c.category', 'cat')
            ->andWhere('cat.id = :val2')
            ->andWhere('c.lang = :val4')
            ->setParameter('val2', $old_category_id)
            ->setParameter('val4', $locale)
         //    ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return CategoryTranslation[] Returns an array of CategoryTranslation objects
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

//    public function findOneBySomeField($value): ?CategoryTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
