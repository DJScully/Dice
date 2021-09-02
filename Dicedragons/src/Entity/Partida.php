<?php

namespace App\Entity;

use App\Repository\PartidaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartidaRepository::class)
 */
class Partida
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="partidas")
     */
    private $Usuario;

    /**
     * @ORM\ManyToMany(targetEntity=Personaje::class, inversedBy="partidas")
     */
    private $Personajes;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Proxima_sesion;

    public function __construct()
    {
        $this->Personajes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    /**
     * @return Collection|Personaje[]
     */
    public function getPersonajes(): Collection
    {
        return $this->Personajes;
    }

    public function addPersonaje(Personaje $personaje): self
    {
        if (!$this->Personajes->contains($personaje)) {
            $this->Personajes[] = $personaje;
        }

        return $this;
    }

    public function removePersonaje(Personaje $personaje): self
    {
        $this->Personajes->removeElement($personaje);

        return $this;
    }

    public function getProximaSesion(): ?\DateTimeInterface
    {
        return $this->Proxima_sesion;
    }

    public function setProximaSesion(\DateTimeInterface $Proxima_sesion): self
    {
        $this->Proxima_sesion = $Proxima_sesion;

        return $this;
    }
}
