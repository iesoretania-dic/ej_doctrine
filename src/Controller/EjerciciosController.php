<?php

namespace App\Controller;

use App\Entity\Grupo;
use App\Entity\Profesor;
use App\Repository\AlumnoRepository;
use App\Repository\GrupoRepository;
use App\Repository\ParteRepository;
use App\Repository\ProfesorRepository;
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

    #[Route('/ap6')]
    final public function ap6(AlumnoRepository $alumnoRepository): Response
    {
        $numEstudiantes = $alumnoRepository->countByAnioNacimiento(1997);
        return $this->render('ejercicios/ap6.html.twig', [
            'num_estudiantes' => $numEstudiantes
        ]);
    }

    #[Route('/ap7/{anio}')]
    final public function ap7(AlumnoRepository $alumnoRepository, int $anio): Response
    {
        $estudiantes = $alumnoRepository->findByAnioNacimientoOrdenado($anio);
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $estudiantes
        ]);
    }

    #[Route('/ap8')]
    final public function ap8(GrupoRepository $grupoRepository): Response
    {
        $grupos = $grupoRepository->findAllOrdenado();
        return $this->render('ejercicios/ap8.html.twig', [
            'grupos' => $grupos
        ]);
    }

    #[Route('/ap9')]
    final public function ap9(GrupoRepository $grupoRepository): Response
    {
        $resultados = $grupoRepository->listAllOrdenadoDescendenteConTotal();
        return $this->render('ejercicios/ap9.html.twig', [
            'resultados' => $resultados
        ]);
    }

    #[Route('/ap10', name: 'ap10')]
    final public function ap10(GrupoRepository $grupoRepository): Response
    {
        $grupos = $grupoRepository->findAllOrdenado();
        return $this->render('ejercicios/ap10.html.twig', [
            'grupos' => $grupos
        ]);
    }

    #[Route('/ap10/{descripcion}', name: 'ap10_alumnado')]
    final public function ap10Grupo(AlumnoRepository $alumnoRepository, Grupo $grupo): Response
    {
        $alumnado = $alumnoRepository->findByGrupoOrdenado($grupo);
        return $this->render('ejercicios/ap1.html.twig', [
            'estudiantes' => $alumnado
        ]);
    }

    #[Route('/ap11', name: 'ap11')]
    final public function ap11(ProfesorRepository $profesorRepository): Response
    {
        $resultados = $profesorRepository->listProfesoresConNumeroPartes();
        return $this->render('ejercicios/ap11.html.twig', [
            'resultados' => $resultados
        ]);
    }

    #[Route('/ap11/{dni}', name: 'ap11_partes')]
    final public function ap11Partes(ParteRepository $parteRepository, Profesor $profesor): Response
    {
        $partes = $parteRepository->findByProfesor($profesor);
        return $this->render('ejercicios/ap11_partes.html.twig', [
            'partes' => $partes,
            'profesor' => $profesor
        ]);
    }
}