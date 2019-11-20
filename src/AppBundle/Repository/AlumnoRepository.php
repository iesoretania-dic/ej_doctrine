<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Alumno;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class AlumnoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumno::class);
    }

    public function findByNombre($nombre)
    {
        return $this
            ->findBy([
                'nombre' => $nombre
            ]);
    }

    public function findByNotNombre($nombre)
    {
        return $this->createQueryBuilder('a')
            ->where('a.nombre <> :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();
    }

    public function findApellidoEmpiezaPor($texto)
    {
        return $this->createQueryBuilder('a')
            ->where('a.apellidos LIKE :valor')
            ->setParameter('valor', $texto . '%')
            ->addOrderBy('a.nombre')
            ->getQuery()
            ->getResult();
    }

    private function findByAnioNacimientoQueryBuilder($anio)
    {

        $fechaMinima = new \DateTime($anio . '/01/01');
        $fechaMaxima = new \DateTime(($anio+1) . '/01/01');

        return $this->createQueryBuilder('a')
            ->addSelect('g')
            ->join('a.grupo', 'g')
            ->where('a.fechaNacimiento >= :fechaMinima')
            ->andWhere('a.fechaNacimiento < :fechaMaxima')
            ->setParameter('fechaMinima', $fechaMinima)
            ->setParameter('fechaMaxima', $fechaMaxima);
    }

    public function findByAnioNacimiento($anio)
    {
        return $this->findByAnioNacimientoQueryBuilder($anio)
            ->getQuery()
            ->getResult();
    }

    public function countByAnioNacimiento($anio)
    {
        return $this->findByAnioNacimientoQueryBuilder($anio)
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function findByAnioNacimientoOrdenados($anio)
    {
        return $this->findByAnioNacimientoQueryBuilder($anio)
            ->orderBy('a.fechaNacimiento', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByGrupo($grupo)
    {
        return $this->createQueryBuilder('a')
            ->where('a.grupo = :grupo')
            ->setParameter('grupo', $grupo)
            ->orderBy('a.apellidos')
            ->addOrderBy('a.nombre')
            ->getQuery()
            ->getResult();
    }
}
