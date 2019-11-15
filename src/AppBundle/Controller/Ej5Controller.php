<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej5Controller extends Controller
{
    /**
     * @Route("/ej5", name="ejercicio5")
     */
    public function ej5Action(AlumnoRepository $alumnoRepository)
    {
        $alumnado = $alumnoRepository->findByAnioNacimiento(1997);

        return $this->render('ej5/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
