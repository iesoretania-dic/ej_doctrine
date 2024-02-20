<?php

namespace App\Repository;

use App\Entity\Parte;
use App\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class ParteRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Parte::class);
    }

    public function findByProfesor(Profesor $profesor): array
    {
        // SELECT p, a, g FROM App\Entity\Parte p JOIN p.alumno a JOIN a.grupo g
        // WHERE p.profesor = :profesor ORDER BY p.fechaCreacion DESC
        return $this->createQueryBuilder('p')
            ->addSelect('a')
            ->addSelect('g')
            ->join('p.alumno', 'a')
            ->join('a.grupo', 'g')
            ->where('p.profesor = :profesor')
            ->orderBy('p.fechaCreacion', 'DESC')
            ->setParameter('profesor', $profesor)
            ->getQuery()
            ->getResult();
    }
}