<?php

namespace App\Repository;

use App\Entity\ColorFamily;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ColorFamily>
 *
 * @method ColorFamily|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorFamily|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorFamily[]    findAll()
 * @method ColorFamily[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorFamilyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorFamily::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ColorFamily $entity, bool $flush = false): void
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
    public function remove(ColorFamily $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * Fonction qui recherche une couleur 
     */
    public function search(string $search):array
    {

        $query = $this->createQueryBuilder('c')
            ->join('c.translations', 'ct')
            ->where('ct.text LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->getQuery();
        $colors = $query->getResult();
        return $colors;
    }

//    /**
//     * @return ColorFamily[] Returns an array of ColorFamily objects
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

//    public function findOneBySomeField($value): ?ColorFamily
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
