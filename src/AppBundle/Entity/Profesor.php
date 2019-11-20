<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="profesor")
 */
class Profesor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $dni;

    /**
     * @ORM\OneToMany(targetEntity="Parte", mappedBy="profesor")
     * @var Parte[]
     */
    private $partes;

    /**
     * @ORM\OneToOne(targetEntity="Grupo", mappedBy="tutor")
     * @var Grupo
     */
    private $tutoria;

    /**
     * Profesor constructor.
     */
    public function __construct()
    {
        $this->partes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNombre() . ' ' . $this->getApellidos();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Profesor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Profesor
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     * @return Profesor
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
        return $this;
    }

    /**
     * @return Parte[]
     */
    public function getPartes()
    {
        return $this->partes;
    }

    /**
     * @param Parte[] $partes
     * @return Profesor
     */
    public function setPartes($partes)
    {
        $this->partes = $partes;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getTutoria()
    {
        return $this->tutoria;
    }

    /**
     * @param Grupo $tutoria
     * @return Profesor
     */
    public function setTutoria($tutoria)
    {
        $this->tutoria = $tutoria;
        return $this;
    }
}
