<?php

namespace App\Repository;

use App\Entity\ConfigurateurPngMaskFloor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConfigurateurPngMaskFloor>
 *
 * @method ConfigurateurPngMaskFloor|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigurateurPngMaskFloor|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigurateurPngMaskFloor[]    findAll()
 * @method ConfigurateurPngMaskFloor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigurateurPngMaskFloorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigurateurPngMaskFloor::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConfigurateurPngMaskFloor $entity, bool $flush = false): void
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
    public function remove(ConfigurateurPngMaskFloor $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return ConfigurateurPngMaskFloor[] Returns an array of ConfigurateurPngMaskFloor objects
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

//    public function findOneBySomeField($value): ?ConfigurateurPngMaskFloor
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
