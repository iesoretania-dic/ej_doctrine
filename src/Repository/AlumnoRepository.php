<?php

namespace App\Repository;

use App\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AlumnoRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Alumno::class);
    }

    public function findByNombre(string $nombre): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a, g FROM App\Entity\Alumno a JOIN a.grupo g WHERE a.nombre = :nombre')
            ->setParameter('nombre', $nombre)
            ->getResult();
    }

    public function findByNoNombre(string $nombre): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a, g FROM App\Entity\Alumno a JOIN a.grupo g WHERE a.nombre != :nombre')
            ->setParameter('nombre', $nombre)
            ->getResult();
    }

    public function findByApellidoOrdenado(string $apellido): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a, g FROM App\Entity\Alumno a JOIN a.grupo g WHERE a.apellidos LIKE :apellido ORDER BY a.nombre')
            ->setParameter('apellido', $apellido . ' %')
            ->getResult();
    }
}