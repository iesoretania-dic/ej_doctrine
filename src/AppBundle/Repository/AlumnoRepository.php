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
}