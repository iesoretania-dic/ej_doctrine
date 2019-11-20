<?php

namespace AppBundle\Controller;

use AppBundle\Repository\GrupoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej8Controller extends Controller
{
    /**
     * @Route("/ej8", name="ejercicio8")
     */
    public function ej8Action(GrupoRepository $grupoRepository)
    {
        $grupos = $grupoRepository->findTodosOrdenados();
        return $this->render('ej8/listado_grupos.html.twig', [
            'grupos' => $grupos
        ]);
    }
}
