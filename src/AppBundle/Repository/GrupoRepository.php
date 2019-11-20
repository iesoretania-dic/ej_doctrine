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

    public function findTodosQueryBuilder()
    {
        return $this->createQueryBuilder('g')
            ->select('g')
            ->addSelect('t')
            ->join('g.tutor', 't');
    }
    public function findTodosOrdenados()
    {
        return $this->findTodosQueryBuilder()
            ->orderBy('g.descripcion')
            ->getQuery()
            ->getResult();
    }

    public function findTodosOrdenadosDecreciente()
    {
        return $this->findTodosQueryBuilder()
            ->orderBy('g.descripcion', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findTodosOrdenadosDecrecienteConTotal()
    {
        return $this->createQueryBuilder('g')
            ->select('g AS grupo')
            ->addSelect('COUNT(a) AS total')->addSelect('t')
            ->join('g.tutor', 't')
            ->join('g.alumnado', 'a')
            ->orderBy('g.descripcion', 'DESC')
            ->groupBy('g')
            ->getQuery()
            ->getResult();
    }
}
