<?php

namespace App\Entity;

use App\Repository\CaracteristiquePersoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaracteristiquePersoRepository::class)]
class CaracteristiquePerso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $value = null;

    #[ORM\ManyToOne(inversedBy: 'caracteristiquePersos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caracteristique $Caracteristique = null;

    #[ORM\ManyToOne(inversedBy: 'caracteristiquePersos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Perso $Perso = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getCaracteristique(): ?Caracteristique
    {
        return $this->Caracteristique;
    }

    public function setCaracteristique(?Caracteristique $Caracteristique): static
    {
        $this->Caracteristique = $Caracteristique;

        return $this;
    }

    public function getPerso(): ?Perso
    {
        return $this->Perso;
    }

    public function setPerso(?Perso $Perso): static
    {
        $this->Perso = $Perso;

        return $this;
    }
}
