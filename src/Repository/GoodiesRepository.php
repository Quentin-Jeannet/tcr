<?php

namespace App\Repository;

use App\Entity\Goodies;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Goodies>
 *
 * @method Goodies|null find($id, $lockMode = null, $lockVersion = null)
 * @method Goodies|null findOneBy(array $criteria, array $orderBy = null)
 * @method Goodies[]    findAll()
 * @method Goodies[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoodiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Goodies::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Goodies $entity, bool $flush = false): void
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
    public function remove(Goodies $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Fonction qui recherche un goodies 
     */
    public function search(string $search):array
    {
        $query = $this->createQueryBuilder('g')
            ->join('g.translations', 'gt')
            ->where('gt.text LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery();
        $colors = $query->getResult();
        return $colors;
    }

//    /**
//     * @return Goodies[] Returns an array of Goodies objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Goodies
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
