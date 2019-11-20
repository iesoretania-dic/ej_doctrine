<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profesor::class);
    }

    public function findTodosOrdenados()
    {
        return $this->createQueryBuilder('p')
            ->addSelect('t')
            ->leftJoin('p.tutoria', 't')
            ->orderBy('p.apellidos')
            ->addOrderBy('p.nombre')
            ->getQuery()
            ->getResult();
    }
}
