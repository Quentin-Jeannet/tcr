<?php

namespace App\Repository;

use App\Entity\Color;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Color>
 *
 * @method Color|null find($id, $lockMode = null, $lockVersion = null)
 * @method Color|null findOneBy(array $criteria, array $orderBy = null)
 * @method Color[]    findAll()
 * @method Color[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Color::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Color $entity, bool $flush = false): void
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
    public function remove(Color $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Fonction qui recherche une couleur 
     */
    public function search(string $search): array
    {

        $query = $this->createQueryBuilder('c')
            ->where('c.name LIKE :search')
            ->orWhere('c.hexadecimal1 LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery();
        $colors = $query->getResult();
        return $colors;
    }

    public function getColorsByCategory($category_id): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.colorFamilies', 'f')
            ->andWhere('f.category = :val')
            ->andwhere("c.isActive = true")
            ->setParameter('val', $category_id)
            ->orderBy('c.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
    
    public function getColorsByFamily($family_id): array
    {
        return $this->createQueryBuilder('c')
            ->join('c.colorFamilies', 'f')
            //    ->join('f.colors', 'cs')
            ->andWhere('f.id = :val4')
            ->andwhere("c.isActive = true")
            ->setParameter('val4', $family_id)
            //    ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }



    //    /**
    //     * @return Color[] Returns an array of Color objects
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

    //    public function findOneBySomeField($value): ?Color
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
