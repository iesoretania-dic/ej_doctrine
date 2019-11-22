<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ProfesorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej16Controller extends Controller
{
    /**
     * @Route("/ej16", name="ejercicio16")
     */
    public function ej16Action(ProfesorRepository $profesorRepository)
    {
        $profesores = $profesorRepository->findSinPartes();

        return $this->render('ej16/listado_profesores.html.twig', [
            'profesores' => $profesores
        ]);
    }

}
