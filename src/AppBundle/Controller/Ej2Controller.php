<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej2Controller extends Controller
{
    /**
     * @Route("/ej2", name="ejercicio2")
     */
    public function ej2Action()
    {
        // Forma antigua, no recomendada
        $alumnado = $this->getDoctrine()
            ->getRepository(Alumno::class)
            ->createQueryBuilder('a')
            ->where('a.nombre <> :nombre')
            ->setParameter('nombre', 'María')
            ->getQuery()
            ->getResult();

        return $this->render('ej2/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
