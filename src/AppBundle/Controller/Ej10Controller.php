<?php

namespace AppBundle\Controller;

use AppBundle\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej10Controller extends Controller
{
    /**
     * @Route("/ej10", name="ejercicio10")
     */
    public function ej10Action(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findTodosOrdenadosDecreciente();
        return $this->render('ej10/listado_grupos.html.twig', [
            'grupos' => $grupos
        ]);
    }
}
