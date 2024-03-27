<?php

namespace App\Repository;

use App\Entity\SubCategory;
use App\Entity\SubCategoryTranslation;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<SubCategoryTranslation>
 *
 * @method SubCategoryTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubCategoryTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubCategoryTranslation[]    findAll()
 * @method SubCategoryTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubCategoryTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubCategoryTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SubCategoryTranslation $entity, bool $flush = false): void
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
    public function remove(SubCategoryTranslation $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function getSubCategorieExceptHome($id_home, $id_intro, $locale): array
    {
        return $this->createQueryBuilder('s')
               ->join('s.subCategory', 'sc')
               ->join('sc.categories', 'c')
            ->andWhere('c.id != :val2')
            ->andWhere('sc.id != :val3')
            ->andWhere('s.lang = :val4')
            ->setParameter('val2', $id_home)
            ->setParameter('val3', $id_intro)
            ->setParameter('val4', $locale)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getSubTrans($category_id, $locale): array
    {
        return $this->createQueryBuilder('s')
               ->join('s.subCategory', 'sc')
               ->join('sc.categories', 'c')
            ->andWhere('c.id = :val2')
            ->andWhere('s.lang = :val4')
            ->setParameter('val2', $category_id)
            ->setParameter('val4', $locale)
            ->getQuery()
            ->getResult()
        ;
    }

    public function getSubCategorySlugUrl($old_sub_id, $locale): array
    {
        return $this->createQueryBuilder('s')
               ->join('s.subCategory', 'cat')
            ->andWhere('cat.id = :val2')
            ->andWhere('s.lang = :val4')
            ->setParameter('val2', $old_sub_id)
            ->setParameter('val4', $locale)
            ->getQuery()
            ->getResult()
        ;
    } 
    public function getASubTrans($category_id, $sub_id, $locale): array
    {
        return $this->createQueryBuilder('s')
               ->join('s.subCategory', 'sub')
               ->join('sub.categories', 'cat')
            ->andWhere('cat.id = :val2')
            ->andWhere('s.lang = :val4')
            ->andWhere('s.subCategory = :val3')
            ->setParameter('val2', $category_id)
            ->setParameter('val4', $locale)
            ->setParameter('val3', $sub_id)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return SubCategoryTranslation[] Returns an array of SubCategoryTranslation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SubCategoryTranslation
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
