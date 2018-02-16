<?php

namespace App\Repository;

use App\Entity\Record;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RecordRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Record::class);
    }

    public function getForDay(\DateTime $day)
    {
        $from = new \DateTime($day->format("Y-m-d")." 00:00:00");
        $to   = new \DateTime($day->format("Y-m-d")." 23:59:59");

        $qb = $this->createQueryBuilder("e");
        $qb
            ->andWhere('e.day BETWEEN :from AND :to')
            ->setParameter('from', $from )
            ->setParameter('to', $to)
          //  ->orderBy('e.start')
        ;
        return $qb->getQuery()->getResult();
    }

}
