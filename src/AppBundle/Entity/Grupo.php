<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="grupo")
 */
class Grupo
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
    private $descripcion;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $aula;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $planta;

    /**
     * @ORM\OneToMany(targetEntity="Alumno", mappedBy="grupo", fetch="EXTRA_LAZY")
     * @var Alumno[]
     */
    private $alumnado;

    /**
     * @ORM\OneToOne(targetEntity="Profesor", inversedBy="tutoria")
     * @ORM\JoinColumn(nullable=false)
     * @var Profesor
     */
    private $tutor;

    /**
     * @ORM\ManyToMany(targetEntity="Profesor")
     * @var Profesor[]
     */
    private $profesores;

    /**
     * Grupo constructor.
     */
    public function __construct()
    {
        $this->alumnado = new ArrayCollection();
        $this->profesores = new ArrayCollection();
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     * @return Grupo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * @return int
     */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * @param int $aula
     * @return Grupo
     */
    public function setAula($aula)
    {
        $this->aula = $aula;
        return $this;
    }

    /**
     * @return int
     */
    public function getPlanta()
    {
        return $this->planta;
    }

    /**
     * @param int $planta
     * @return Grupo
     */
    public function setPlanta($planta)
    {
        $this->planta = $planta;
        return $this;
    }

    /**
     * @return Alumno[]
     */
    public function getAlumnado()
    {
        return $this->alumnado;
    }

    /**
     * @param Alumno[] $alumnado
     * @return Grupo
     */
    public function setAlumnado($alumnado)
    {
        $this->alumnado = $alumnado;
        return $this;
    }

    /**
     * @return Profesor
     */
    public function getTutor()
    {
        return $this->tutor;
    }

    /**
     * @param Profesor $tutor
     * @return Grupo
     */
    public function setTutor($tutor)
    {
        $this->tutor = $tutor;
        return $this;
    }

    /**
     * @return Profesor[]
     */
    public function getProfesores()
    {
        return $this->profesores;
    }

    /**
     * @param Profesor[] $profesores
     * @return Grupo
     */
    public function setProfesores($profesores)
    {
        $this->profesores = $profesores;
        return $this;
    }
}
