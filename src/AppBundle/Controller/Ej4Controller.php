<?php

namespace AppBundle\Controller;

use AppBundle\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej4Controller extends Controller
{
    /**
     * @Route("/ej4/{texto}", name="ejercicio4")
     */
    public function ej4Action(AlumnoRepository $alumnoRepository, $texto)
    {
        $alumnado = $alumnoRepository->findApellidoEmpiezaPor($texto);

        return $this->render('ej4/listado.html.twig', [
            'alumnos' => $alumnado
        ]);
    }
}
