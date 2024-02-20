<?php

namespace App\Repository;

use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class ProfesorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Profesor::class);
    }

    private function createQueryBuilderOrdenadosConGrupos(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->addSelect('g')
            ->leftJoin('p.tutoria', 'g')
            ->orderBy('p.apellidos')
            ->addOrderBy('p.nombre');
    }

    public function findOrdenados(): array
    {
        return $this->createQueryBuilderOrdenadosConGrupos()
            ->getQuery()
            ->getResult();
    }

    public function listProfesoresConNumeroPartes(): array
    {
        return $this->createQueryBuilderOrdenadosConGrupos()
            ->select('p AS profesor, g, SIZE(p.partes) AS total')
            ->getQuery()
            ->getResult();
    }
}