<?php

namespace App\Entity;

use App\Repository\CompetencePersoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencePersoRepository::class)]
class CompetencePerso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $value = null;

    #[ORM\ManyToOne(inversedBy: 'competencePersos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Competence $Competence = null;

    #[ORM\ManyToOne(inversedBy: 'competencePersos')]
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

    public function getCompetence(): ?Competence
    {
        return $this->Competence;
    }

    public function setCompetence(?Competence $Competence): static
    {
        $this->Competence = $Competence;

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
