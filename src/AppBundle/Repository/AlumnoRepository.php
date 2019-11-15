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

    public function findByAnioNacimiento($anio)
    {
        $fechaMinima = new \DateTime($anio . '/01/01');
        $fechaMaxima = new \DateTime(($anio+1) . '/01/01');

        return $this->createQueryBuilder('a')
            ->where('a.fechaNacimiento >= :fechaMinima')
            ->andWhere('a.fechaNacimiento < :fechaMaxima')
            ->setParameter('fechaMinima', $fechaMinima)
            ->setParameter('fechaMaxima', $fechaMaxima)
            ->getQuery()
            ->getResult();
    }
}
