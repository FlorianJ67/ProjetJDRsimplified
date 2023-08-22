<?php

namespace App\Entity;

use App\Repository\CompetenceInflueCaracteristiqueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceInflueCaracteristiqueRepository::class)]
class CompetenceInflueCaracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $bonusValue = null;

    #[ORM\ManyToOne(inversedBy: 'competenceInflueCaracteristiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caracteristique $Caracteristique = null;

    #[ORM\ManyToOne(inversedBy: 'competenceInflueCaracteristiques')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Competence $Competence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBonusValue(): ?int
    {
        return $this->bonusValue;
    }

    public function setBonusValue(int $bonusValue): static
    {
        $this->bonusValue = $bonusValue;

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

    public function getCompetence(): ?Competence
    {
        return $this->Competence;
    }

    public function setCompetence(?Competence $Competence): static
    {
        $this->Competence = $Competence;

        return $this;
    }
    public function __toString() {
        return $this->getCompetence()->getNom().' - '.$this->getCaracteristique()->getNom();
    }
}
