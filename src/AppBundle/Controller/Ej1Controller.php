<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej1Controller extends Controller
{
    /**
     * @Route("/ej1", name="ejercicio1")
     */
    public function ej1Action(AlumnoRepository $alumnoRepository)
    {
        $alumnado = $alumnoRepository->findByNombre('María');

        return $this->render('ej1/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
