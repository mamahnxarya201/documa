<?php

namespace App\Repository;

use App\Entity\UsersGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<UsersGroup>
 */
class UsersGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersGroup::class);
    }

//    /**
//     * @return UsersGroup[] Returns an array of UsersGroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsersGroup
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function getListReviewerByGroupId($groupId)
    {
        return $this->createQueryBuilder('ug')
            ->andWhere('ug.group = :groupId')
            ->andWhere('ug.role = :roleId')
            ->setParameter('groupId', $groupId) // Ensure $groupId is a valid UUID
            ->setParameter('roleId', Uuid::fromString('0193f363-71dd-78f8-868c-3662c20a84a4'))   // Ensure $roleId is a valid UUID
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

    }
}
