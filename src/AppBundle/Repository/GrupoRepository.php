<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class GrupoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Grupo::class);
    }

    public function findTodosOrdenados()
    {
        return $this->createQueryBuilder('g')
            ->select('g')
            ->addSelect('t')
            ->join('g.tutor', 't')
            ->orderBy('g.descripcion')
            ->getQuery()
            ->getResult();
    }
}
