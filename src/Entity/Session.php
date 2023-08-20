<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $pointsCaracPersos = null;

    #[ORM\Column]
    private ?int $pointsCompPersos = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\ManyToMany(targetEntity: Competence::class, inversedBy: 'sessions')]
    private Collection $Competences;

    #[ORM\ManyToMany(targetEntity: Caracteristique::class, inversedBy: 'sessions')]
    private Collection $Caracteristiques;

    #[ORM\ManyToMany(targetEntity: Perso::class, inversedBy: 'sessions')]
    private Collection $Persos;

    public function __construct()
    {
        $this->Competences = new ArrayCollection();
        $this->Caracteristiques = new ArrayCollection();
        $this->Persos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPointsCaracPersos(): ?int
    {
        return $this->pointsCaracPersos;
    }

    public function setPointsCaracPersos(int $pointsCaracPersos): static
    {
        $this->pointsCaracPersos = $pointsCaracPersos;

        return $this;
    }

    public function getPointsCompPersos(): ?int
    {
        return $this->pointsCompPersos;
    }

    public function setPointsCompPersos(int $pointsCompPersos): static
    {
        $this->pointsCompPersos = $pointsCompPersos;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetence(): Collection
    {
        return $this->Competences;
    }

    public function addCompetence(Competence $competence): static
    {
        if (!$this->Competences->contains($competence)) {
            $this->Competences->add($competence);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): static
    {
        $this->Competences->removeElement($competence);

        return $this;
    }

    /**
     * @return Collection<int, Caracteristique>
     */
    public function getCaracteristique(): Collection
    {
        return $this->Caracteristiques;
    }

    public function addCaracteristique(Caracteristique $caracteristique): static
    {
        if (!$this->Caracteristiques->contains($caracteristique)) {
            $this->Caracteristiques->add($caracteristique);
        }

        return $this;
    }

    public function removeCaracteristique(Caracteristique $caracteristique): static
    {
        $this->Caracteristiques->removeElement($caracteristique);

        return $this;
    }

    /**
     * @return Collection<int, Perso>
     */
    public function getPersos(): Collection
    {
        return $this->Persos;
    }

    public function addPerso(Perso $perso): static
    {
        if (!$this->Persos->contains($perso)) {
            $this->Persos->add($perso);
        }

        return $this;
    }

    public function removePerso(Perso $perso): static
    {
        $this->Persos->removeElement($perso);

        return $this;
    }

    public function __toString() 
    {
        return $this->name;
    }
}
