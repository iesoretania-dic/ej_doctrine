<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej6Controller extends Controller
{
    /**
     * @Route("/ej6", name="ejercicio6")
     */
    public function ej6Action(AlumnoRepository $alumnoRepository)
    {
        $cuentaAlumnado = $alumnoRepository->countByAnioNacimiento(1997);

        return $this->render('ej6/listado.html.twig', [
            'cuenta_alumnado' => $cuentaAlumnado
        ]);
    }
}
