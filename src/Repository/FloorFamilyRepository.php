<?php

namespace App\Repository;

use App\Entity\FloorFamily;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FloorFamily>
 *
 * @method FloorFamily|null find($id, $lockMode = null, $lockVersion = null)
 * @method FloorFamily|null findOneBy(array $criteria, array $orderBy = null)
 * @method FloorFamily[]    findAll()
 * @method FloorFamily[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloorFamilyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FloorFamily::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FloorFamily $entity, bool $flush = false): void
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
    public function remove(FloorFamily $entity, bool $flush = false): void
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
            ->where('f.text LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery();
        $floorFamily = $query->getResult();
        return $floorFamily;
    }

//    /**
//     * @return FloorFamily[] Returns an array of FloorFamily objects
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

//    public function findOneBySomeField($value): ?FloorFamily
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
