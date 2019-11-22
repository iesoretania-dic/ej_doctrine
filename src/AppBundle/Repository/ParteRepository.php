<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Parte;
use AppBundle\Entity\Profesor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class ParteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parte::class);
    }

    public function findByProfesor(Profesor $profesor)
    {
        return $this->createQueryBuilder('p')
            ->where('p.profesor = :profe')
            ->setParameter('profe', $profesor)
            ->getQuery()
            ->getResult();
    }

    public function findByTextoObservaciones($texto)
    {
        return $this->createQueryBuilder('p')
            ->addSelect('a')
            ->addSelect('g')
            ->join('p.alumno', 'a')
            ->join('a.grupo', 'g')
            ->where('p.observaciones LIKE :texto')
            ->setParameter('texto', '%' . $texto .'%')
            ->getQuery()
            ->getResult();
    }
}
