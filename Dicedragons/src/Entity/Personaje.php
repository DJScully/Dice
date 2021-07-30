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
     * @ORM\OneToOne(targetEntity=Razas::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $Raza;

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
     * @ORM\Column(type="string", length=255)
     */
    private $Trasfondo;

    public function __construct()
    {
        $this->Clase = new ArrayCollection();
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

    public function getRaza(): ?Razas
    {
        return $this->Raza;
    }

    public function setRaza(Razas $Raza): self
    {
        $this->Raza = $Raza;

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
}
