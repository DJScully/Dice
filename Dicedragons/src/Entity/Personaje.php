<?php

namespace App\Entity;

use App\Repository\PersonajeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonajeRepository::class)
 */
class Personaje
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="personajes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

 
    /**
     * @ORM\ManyToMany(targetEntity=Clases::class)
     */
    private $Clase;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Alienacion;

     /**
     * @ORM\Column(type="text")
     */
    private $Trasfondo;

    /**
     * @ORM\ManyToMany(targetEntity=Partida::class, mappedBy="Personajes")
     */
    private $partidas;

    /**
     * @ORM\ManyToOne(targetEntity=Razas::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $Raza;

    /**
     * @ORM\Column(type="integer")
     */
    private $Fuerza;

    /**
     * @ORM\Column(type="integer")
     */
    private $Destreza;

    /**
     * @ORM\Column(type="integer")
     */
    private $Constitucion;

    /**
     * @ORM\Column(type="integer")
     */
    private $Inteligencia;

    /**
     * @ORM\Column(type="integer")
     */
    private $Sabiduria;

    /**
     * @ORM\Column(type="integer")
     */
    private $Carisma;

    public function __construct()
    {
        $this->Clase = new ArrayCollection();
        $this->partidas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }


    /**
     * @return Collection|Clases[]
     */
    public function getClase(): Collection
    {
        return $this->Clase;
    }

    public function addClase(Clases $clase): self
    {
        if (!$this->Clase->contains($clase)) {
            $this->Clase[] = $clase;
        }

        return $this;
    }

    public function removeClase(Clases $clase): self
    {
        $this->Clase->removeElement($clase);

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getAlienacion(): ?string
    {
        return $this->Alienacion;
    }

    public function setAlienacion(string $Alienacion): self
    {
        $this->Alienacion = $Alienacion;

        return $this;
    }

    public function getTrasfondo(): ?string
    {
        return $this->Trasfondo;
    }

    public function setTrasfondo(string $Trasfondo): self
    {
        $this->Trasfondo = $Trasfondo;

        return $this;
    }

    /**
     * @return Collection|Partida[]
     */
    public function getPartidas(): Collection
    {
        return $this->partidas;
    }

    public function addPartida(Partida $partida): self
    {
        if (!$this->partidas->contains($partida)) {
            $this->partidas[] = $partida;
            $partida->addPersonaje($this);
        }

        return $this;
    }

    public function removePartida(Partida $partida): self
    {
        if ($this->partidas->removeElement($partida)) {
            $partida->removePersonaje($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Nombre;
    }

    public function getRaza(): ?Razas
    {
        return $this->Raza;
    }

    public function setRaza(?Razas $Raza): self
    {
        $this->Raza = $Raza;

        return $this;
    }

    public function getFuerza(): ?int
    {
        return $this->Fuerza;
    }

    public function setFuerza(int $Fuerza): self
    {
        $this->Fuerza = $Fuerza;

        return $this;
    }

    public function getDestreza(): ?int
    {
        return $this->Destreza;
    }

    public function setDestreza(int $Destreza): self
    {
        $this->Destreza = $Destreza;

        return $this;
    }

    public function getConstitucion(): ?int
    {
        return $this->Constitucion;
    }

    public function setConstitucion(int $Constitucion): self
    {
        $this->Constitucion = $Constitucion;

        return $this;
    }

    public function getInteligencia(): ?int
    {
        return $this->Inteligencia;
    }

    public function setInteligencia(int $Inteligencia): self
    {
        $this->Inteligencia = $Inteligencia;

        return $this;
    }

    public function getSabiduria(): ?int
    {
        return $this->Sabiduria;
    }

    public function setSabiduria(int $Sabiduria): self
    {
        $this->Sabiduria = $Sabiduria;

        return $this;
    }

    public function getCarisma(): ?int
    {
        return $this->Carisma;
    }

    public function setCarisma(int $Carisma): self
    {
        $this->Carisma = $Carisma;

        return $this;
    }
}
