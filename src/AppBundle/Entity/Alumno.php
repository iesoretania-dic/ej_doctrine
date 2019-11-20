<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="alumno")
 */
class Alumno
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
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaNacimiento;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $observaciones;

    /**
     * @ORM\OneToMany(targetEntity="Parte", mappedBy="alumno")
     * @var Parte[]
     */
    private $partes;

    /**
     * @ORM\ManyToOne(targetEntity="Grupo", inversedBy="alumnado")
     * @ORM\JoinColumn(nullable=false)
     * @var Grupo
     */
    private $grupo;

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
     * @return Alumno
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
     * @return Alumno
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param \DateTime $fechaNacimiento
     * @return Alumno
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
        return $this;
    }

    /**
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * @param string $observaciones
     * @return Alumno
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
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
     * @return Alumno
     */
    public function setPartes($partes)
    {
        $this->partes = $partes;
        return $this;
    }

    /**
     * @return Grupo
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param Grupo $grupo
     * @return Alumno
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;
        return $this;
    }
}
