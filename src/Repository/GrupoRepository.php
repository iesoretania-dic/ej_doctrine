<?php

namespace App\Repository;

use App\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class GrupoRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Grupo::class);
    }

    public function findAllOrdenado(): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT g, t FROM App\Entity\Grupo g JOIN g.tutor t ORDER BY g.descripcion')
            ->getResult();
    }

    public function listAllOrdenadoDescendenteConTotal(): array
    {
        // 'SELECT g AS grupo, t, SIZE(g.alumnado) AS total FROM App\Entity\Grupo g
        // JOIN g.tutor t ORDER BY g.descripcion DESC')
        return $this->createQueryBuilder('g')
            ->select('g AS grupo')
            ->addSelect('t')
            ->addSelect('SIZE(g.alumnado) AS total')
            ->join('g.tutor', 't')
            ->orderBy('g.descripcion', 'DESC')
            ->getQuery()
            ->getResult();
    }
}