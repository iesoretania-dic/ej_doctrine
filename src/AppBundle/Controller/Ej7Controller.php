<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej7Controller extends Controller
{
    /**
     * @Route("/ej7/{anio}", name="ejercicio7")
     */
    public function ej7Action(AlumnoRepository $alumnoRepository, $anio)
    {
        $alumnado = $alumnoRepository->findByAnioNacimientoOrdenados($anio);

        return $this->render('ej7/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
