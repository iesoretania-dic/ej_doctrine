<?php

namespace App\Controller;

use App\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EjerciciosController extends AbstractController
{
    #[Route('/ap1')]
    final public function ap1(AlumnoRepository $alumnoRepository): Response
    {
        $estudiantes = $alumnoRepository->findByNombre('María');
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }

    #[Route('/ap2')]
    final public function ap2(AlumnoRepository $alumnoRepository): Response
    {
        $estudiantes = $alumnoRepository->findByNoNombre('María');
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }

    #[Route('/ap3/{nombre}')]
    final public function ap3(AlumnoRepository $alumnoRepository, string $nombre): Response
    {
        $estudiantes = $alumnoRepository->findByNombre($nombre);
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }

    #[Route('/ap4')]
    final public function ap4(AlumnoRepository $alumnoRepository): Response
    {
        $estudiantes = $alumnoRepository->findByApellidoOrdenado('Ojeda');
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }

    #[Route('/ap5')]
    final public function ap5(AlumnoRepository $alumnoRepository): Response
    {
        $estudiantes = $alumnoRepository->findByAnioNacimiento(1997);
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }
}