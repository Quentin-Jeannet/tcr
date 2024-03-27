<?php

namespace App\Repository;

use App\Entity\FloorPattern;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FloorPattern>
 *
 * @method FloorPattern|null find($id, $lockMode = null, $lockVersion = null)
 * @method FloorPattern|null findOneBy(array $criteria, array $orderBy = null)
 * @method FloorPattern[]    findAll()
 * @method FloorPattern[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloorPatternRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FloorPattern::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FloorPattern $entity, bool $flush = false): void
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
    public function remove(FloorPattern $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Fonction qui recherche une famille de sol
     */
    public function search(string $search): array
    {

        $query = $this->createQueryBuilder('f')
            ->where('f.name LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery();
        $floorFamily = $query->getResult();
        return $floorFamily;
    }

//    /**
//     * @return FloorPattern[] Returns an array of FloorPattern objects
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

//    public function findOneBySomeField($value): ?FloorPattern
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
