<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej17Controller extends Controller
{
    /**
     * @Route("/ej17", name="ejercicio17")
     */
    public function ej17Action(AlumnoRepository $alumnoRepository)
    {
        $alumnado = $alumnoRepository->findSinPartes();

        return $this->render('ej17/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }

}
