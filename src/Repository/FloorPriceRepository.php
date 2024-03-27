<?php

namespace App\Repository;

use App\Entity\FloorPrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FloorPrice>
 *
 * @method FloorPrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method FloorPrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method FloorPrice[]    findAll()
 * @method FloorPrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FloorPriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FloorPrice::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FloorPrice $entity, bool $flush = false): void
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
    public function remove(FloorPrice $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Fonction qui récupère les rendus disponibles pour une famille de sol
     */
    public function findPriceRenderDistinctInFamily($id)
    {
        $query = $this->createQueryBuilder('p')
            ->join('p.floorRender', 'r')
            ->groupBy('p.floorRender')
            ->where('p.floorFamily = :id')
            ->orderBy('r.name', 'ASC')
            ->setParameter('id', $id)
            ->getQuery();
        $prices = $query->getResult();
        return $prices;
    }

    /**
     * Fonction qui récupére les epaisseurs disponibles pour une famille de sol
     */
    public function findPriceThicknessDistinctInFamily($id)
    {
        $query = $this->createQueryBuilder('p')
            ->join('p.floorThickness', 't')
            ->groupBy('p.floorThickness')
            ->where('p.floorFamily = :id')
            ->orderBy('t.thickness', 'ASC')
            ->setParameter('id', $id)
            ->getQuery();
        $prices = $query->getResult();
        return $prices;
    }

    /**
     * 
     */
    public function findPriceByFamilyAndRender($renderId, $familyId){
        $query = $this->createQueryBuilder('p')
            ->join('p.floorRender', 'r')
            ->join('p.floorFamily', 'f')
            ->groupBy('p.floorThickness')
            ->where('r.id = :renderId')
            ->andWhere('f.id = :familyId')
            ->setParameter('renderId', $renderId)
            ->setParameter('familyId', $familyId)
            ->getQuery();
        $prices = $query->getResult();
        return $prices;
    }

//    /**
//     * @return FloorPrice[] Returns an array of FloorPrice objects
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

//    public function findOneBySomeField($value): ?FloorPrice
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
