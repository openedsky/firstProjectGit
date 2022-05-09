<?php

namespace App\Repository;

use App\Entity\Release;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Release>
 *
 * @method Release|null find($id, $lockMode = null, $lockVersion = null)
 * @method Release|null findOneBy(array $criteria, array $orderBy = null)
 * @method Release[]    findAll()
 * @method Release[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReleaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Release::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Release $entity, bool $flush = true): void
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
    public function remove(Release $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Release[] Returns an array of Release objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Release
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findReleaseByPagination():Query
    {
        $qb = $this->createQueryBuilder('r')
            ->andWhere('r.isVisible = 1')
            ->orderBy('r.datePublished', 'DESC');

        return $qb->getQuery();
    }
}
