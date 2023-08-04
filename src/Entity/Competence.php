<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Competence', targetEntity: CompetencePerso::class, orphanRemoval: true)]
    private Collection $competencePersos;

    #[ORM\OneToMany(mappedBy: 'Competence', targetEntity: CompetenceInflueCaracteristique::class, orphanRemoval: true)]
    private Collection $competenceInflueCaracteristiques;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'Competence')]
    private Collection $sessions;

    public function __construct()
    {
        $this->competencePersos = new ArrayCollection();
        $this->competenceInflueCaracteristiques = new ArrayCollection();
        $this->sessions = new ArrayCollection();
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

    /**
     * @return Collection<int, CompetencePerso>
     */
    public function getCompetencePersos(): Collection
    {
        return $this->competencePersos;
    }

    public function addCompetencePerso(CompetencePerso $competencePerso): static
    {
        if (!$this->competencePersos->contains($competencePerso)) {
            $this->competencePersos->add($competencePerso);
            $competencePerso->setCompetence($this);
        }

        return $this;
    }

    public function removeCompetencePerso(CompetencePerso $competencePerso): static
    {
        if ($this->competencePersos->removeElement($competencePerso)) {
            // set the owning side to null (unless already changed)
            if ($competencePerso->getCompetence() === $this) {
                $competencePerso->setCompetence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CompetenceInflueCaracteristique>
     */
    public function getCompetenceInflueCaracteristiques(): Collection
    {
        return $this->competenceInflueCaracteristiques;
    }

    public function addCompetenceInflueCaracteristique(CompetenceInflueCaracteristique $competenceInflueCaracteristique): static
    {
        if (!$this->competenceInflueCaracteristiques->contains($competenceInflueCaracteristique)) {
            $this->competenceInflueCaracteristiques->add($competenceInflueCaracteristique);
            $competenceInflueCaracteristique->setCompetence($this);
        }

        return $this;
    }

    public function removeCompetenceInflueCaracteristique(CompetenceInflueCaracteristique $competenceInflueCaracteristique): static
    {
        if ($this->competenceInflueCaracteristiques->removeElement($competenceInflueCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($competenceInflueCaracteristique->getCompetence() === $this) {
                $competenceInflueCaracteristique->setCompetence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Session>
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): static
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions->add($session);
            $session->addCompetence($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeCompetence($this);
        }

        return $this;
    }
}
