<?php

namespace App\Repository;

use App\Entity\Illustrators;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Illustrators>
 *
 * @method Illustrators|null find($id, $lockMode = null, $lockVersion = null)
 * @method Illustrators|null findOneBy(array $criteria, array $orderBy = null)
 * @method Illustrators[]    findAll()
 * @method Illustrators[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IllustratorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Illustrators::class);
    }

    public function add(Illustrators $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Illustrators $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Illustrators[] Returns an array of Illustrators objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Illustrators
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findByName($name) {
        $result = $this->createQueryBuilder('g')
            ->andWhere('g.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getArrayResult();
        $arrayCount = count($result);
        return $arrayCount;
    }
}
