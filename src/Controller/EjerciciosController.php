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
}