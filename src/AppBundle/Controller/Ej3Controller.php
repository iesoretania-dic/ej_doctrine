<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej3Controller extends Controller
{
    /**
     * @Route("/ej3/{nombre}", name="ejercicio3")
     */
    public function ej3Action(AlumnoRepository $alumnoRepository, $nombre)
    {
        $alumnado = $alumnoRepository->findByNombre($nombre);

        return $this->render('ej3/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
