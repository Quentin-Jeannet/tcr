<?php

namespace App\Repository;

use App\Entity\Slug;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Slug>
 *
 * @method Slug|null find($id, $lockMode = null, $lockVersion = null)
 * @method Slug|null findOneBy(array $criteria, array $orderBy = null)
 * @method Slug[]    findAll()
 * @method Slug[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlugRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Slug::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Slug $entity, bool $flush = false): void
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
    public function remove(Slug $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }


    public function findByCategoryAndLocal($categoryId, $locale): ?Slug
    {
        return $this->createQueryBuilder('s')
            ->join('s.categoryTranslation', 'ct')
            ->join('ct.category', 'c')
            ->andWhere('c.id = :categoryId')
            ->setParameter('categoryId', $categoryId)
            ->andWhere('s.locale = :locale')
            ->setParameter('locale', $locale)       
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    public function findBySubCategoryAndLocal($subCategoyId, $locale): ?Slug
    {
        return $this->createQueryBuilder('s')
            ->join('s.subCategoryTranslation', 'sct')
            ->join('sct.subCategory', 'sc')
            ->andWhere('sc.id = :subCategoyId')
            ->setParameter('subCategoyId', $subCategoyId)
            ->andWhere('s.locale = :locale')
            ->setParameter('locale', $locale)       
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByTextCategory($text): ?Slug
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.categoryTranslation', 'sct')
            ->andWhere('sct is not null')
            ->andWhere('s.text = :text')
            ->setParameter('text', $text)       
            ->getQuery()
            ->getResult();

        if (count($query) > 0) {
            return $query[0];
        }
        ;
    }

//    public function findOneBySomeField($value): ?Slug
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
