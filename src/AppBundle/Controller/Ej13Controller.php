<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Profesor;
use AppBundle\Repository\AlumnoRepository;
use AppBundle\Repository\ParteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej13Controller extends Controller
{
    /**
     * @Route("/ej13", name="ejercicio13")
     */
    public function ej13Action(AlumnoRepository $alumnoRepository)
    {
        $alumnado = $alumnoRepository->findConCuentaPartes();
        return $this->render('ej13/listado_alumnado_partes.html.twig', [
            'alumnos' => $alumnado
        ]);
    }

    /**
     * @Route("/ej12/partes/{id}", name="ejercicio12_partes")
     */
    public function ej12PartesAction(
        ParteRepository $parteRepository,
        Profesor $profesor
    ) {
        $partes = $parteRepository->findByProfesor($profesor);
        return $this->render('ej12/listado_partes.html.twig', [
            'partes' => $partes,
            'profesor' => $profesor
        ]);
    }

}
