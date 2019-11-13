<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej2Controller extends Controller
{
    /**
     * @Route("/ej2", name="ejercicio2")
     */
    public function ej2Action(AlumnoRepository $alumnoRepository)
    {
        $alumnado = $alumnoRepository->findByNotNombre('María');

        return $this->render('ej2/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
