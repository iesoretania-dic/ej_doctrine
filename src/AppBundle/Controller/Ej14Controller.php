<?php

namespace AppBundle\Controller;

use AppBundle\Repository\ParteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class Ej14Controller extends Controller
{
    /**
     * @Route("/ej14/{texto}", name="ejercicio14")
     */
    public function ej14Action(ParteRepository $parteRepository, $texto)
    {
        $partes = $parteRepository->findByTextoObservaciones($texto);
        return $this->render('ej14/listado_partes.html.twig', [
            'partes' => $partes,
        ]);
    }

}
