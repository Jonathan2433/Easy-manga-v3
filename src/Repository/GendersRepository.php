<?php

namespace App\Repository;

use App\Entity\Genders;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Genders>
 *
 * @method Genders|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genders|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genders[]    findAll()
 * @method Genders[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GendersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genders::class);
    }

    public function add(Genders $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Genders $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Genders[] Returns an array of Genders objects
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

//    public function findOneBySomeField($value): ?Genders
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findOneByName($name) {
        $result = $this->createQueryBuilder('g')
            ->andWhere('g.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->getArrayResult();
        $arrayCount = count($result);
        return $arrayCount;
    }

}


