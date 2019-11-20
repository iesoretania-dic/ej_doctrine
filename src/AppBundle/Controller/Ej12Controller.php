<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Profesor;
use AppBundle\Repository\ParteRepository;
use AppBundle\Repository\ProfesorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej12Controller extends Controller
{
    /**
     * @Route("/ej12", name="ejercicio12_profesores")
     */
    public function ej12Action(ProfesorRepository $profesorRepository)
    {
        $profesores = $profesorRepository->findTodosOrdenados();
        return $this->render('ej12/listado_profesores.html.twig', [
            'profesores' => $profesores
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
