<?php

namespace App\Repository;

use App\Entity\Alumno;
use App\Entity\Grupo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class AlumnoRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $managerRegistry)
    {
        parent::__construct($managerRegistry, Alumno::class);
    }

    private function createConGrupoQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('a')
            // las dos líneas siguientes son un FETCH JOIN
            ->addSelect('g')
            ->join('a.grupo', 'g');
    }

    public function findByNombre(string $nombre): array
    {
        return $this->createConGrupoQueryBuilder()
            ->where('a.nombre = :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();
    }

    public function findByNoNombre(string $nombre): array
    {
        return $this->createConGrupoQueryBuilder()
            ->where('a.nombre != :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();
    }

    public function findByApellidoOrdenado(string $apellido): array
    {
        return $this->createConGrupoQueryBuilder()
            ->where('a.apellidos LIKE :apellido')
            ->orderBy('a.nombre')
            ->setParameter('apellido', $apellido . ' %')
            ->getQuery()
            ->getResult();
    }

    public function findByAnioNacimiento(int $anio): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a, g FROM App\Entity\Alumno a JOIN a.grupo g WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento <= :fin')
            ->setParameter('inicio', new \DateTime($anio . '-01-01'))
            ->setParameter('fin', new \DateTime($anio . '-12-31'))
            ->getResult();
    }

    public function countByAnioNacimiento(int $anio): int
    {
        return $this->getEntityManager()
            ->createQuery('SELECT COUNT(a) FROM App\Entity\Alumno a WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento <= :fin')
            ->setParameter('inicio', new \DateTime($anio . '-01-01'))
            ->setParameter('fin', new \DateTime($anio . '-12-31'))
            ->getSingleScalarResult();
    }


    public function findByAnioNacimientoOrdenado(int $anio): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a, g FROM App\Entity\Alumno a JOIN a.grupo g WHERE a.fechaNacimiento >= :inicio AND a.fechaNacimiento <= :fin ORDER BY a.fechaNacimiento DESC')
            ->setParameter('inicio', new \DateTime($anio . '-01-01'))
            ->setParameter('fin', new \DateTime($anio . '-12-31'))
            ->getResult();
    }

    public function findByGrupoOrdenado(Grupo $grupo): array
    {
        return $this->getEntityManager()
            ->createQuery('SELECT a FROM App\Entity\Alumno a WHERE a.grupo = :grupo ORDER BY a.apellidos, a.nombre')
            ->setParameter('grupo', $grupo)
            ->getResult();
    }
}