<?php

namespace App\Repository;

use App\Entity\ConfigurateurPngOriginal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConfigurateurPngOriginal>
 *
 * @method ConfigurateurPngOriginal|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConfigurateurPngOriginal|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConfigurateurPngOriginal[]    findAll()
 * @method ConfigurateurPngOriginal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConfigurateurPngOriginalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConfigurateurPngOriginal::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConfigurateurPngOriginal $entity, bool $flush = false): void
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
    public function remove(ConfigurateurPngOriginal $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

//    /**
//     * @return ConfigurateurPngOriginal[] Returns an array of ConfigurateurPngOriginal objects
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

//    public function findOneBySomeField($value): ?ConfigurateurPngOriginal
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
