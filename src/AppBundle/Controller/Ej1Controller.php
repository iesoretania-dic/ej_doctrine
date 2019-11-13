<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Alumno;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej1Controller extends Controller
{
    /**
     * @Route("/ej1", name="ejercicio1")
     */
    public function ej1Action()
    {
        // Forma antigua, no recomendada
        $alumnado = $this->getDoctrine()
            ->getRepository(Alumno::class)
            ->findBy([
                'nombre' => 'María'
            ]);

        return $this->render('ej1/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
