<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej3Controller extends Controller
{
    /**
     * @Route("/ej3/{nombre}", name="ejercicio3")
     */
    public function ej3Action($nombre)
    {
        // Forma antigua, no recomendada
        $alumnado = $this->getDoctrine()
            ->getRepository(Alumno::class)
            ->createQueryBuilder('a')
            ->where('a.nombre = :nombre')
            ->setParameter('nombre', $nombre)
            ->getQuery()
            ->getResult();

        return $this->render('ej3/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
