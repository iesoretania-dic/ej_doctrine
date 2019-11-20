<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Grupo;
use AppBundle\Repository\AlumnoRepository;
use AppBundle\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej11Controller extends Controller
{
    /**
     * @Route("/ej11", name="ejercicio11_grupos")
     */
    public function ej11Action(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findTodosOrdenados();
        return $this->render('ej11/listado_grupos.html.twig', [
            'grupos' => $grupos
        ]);
    }

    /**
     * @Route("/ej11/{id}", name="ejercicio11_alumnado")
     */
    public function ej11AlumnadoAction(
        AlumnoRepository $alumnoRepository,
        Grupo $grupo
    ) {
        $alumnado = $alumnoRepository->findByGrupo($grupo);
        return $this->render('ej11/listado_alumnado.html.twig', [
            'alumnos' => $alumnado,
            'grupo' => $grupo
        ]);
    }
}
