<?php

namespace App\Entity;

use App\Repository\CaracteristiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaracteristiqueRepository::class)]
class Caracteristique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Caracteristique', targetEntity: CaracteristiquePerso::class, orphanRemoval: true)]
    private Collection $caracteristiquePersos;

    #[ORM\OneToMany(mappedBy: 'Caracteristique', targetEntity: CompetenceInflueCaracteristique::class, orphanRemoval: true)]
    private Collection $competenceInflueCaracteristiques;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'Caracteristique')]
    private Collection $sessions;

    public function __construct()
    {
        $this->caracteristiquePersos = new ArrayCollection();
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
     * @return Collection<int, CaracteristiquePerso>
     */
    public function getCaracteristiquePersos(): Collection
    {
        return $this->caracteristiquePersos;
    }

    public function addCaracteristiquePerso(CaracteristiquePerso $caracteristiquePerso): static
    {
        if (!$this->caracteristiquePersos->contains($caracteristiquePerso)) {
            $this->caracteristiquePersos->add($caracteristiquePerso);
            $caracteristiquePerso->setCaracteristique($this);
        }

        return $this;
    }

    public function removeCaracteristiquePerso(CaracteristiquePerso $caracteristiquePerso): static
    {
        if ($this->caracteristiquePersos->removeElement($caracteristiquePerso)) {
            // set the owning side to null (unless already changed)
            if ($caracteristiquePerso->getCaracteristique() === $this) {
                $caracteristiquePerso->setCaracteristique(null);
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
            $competenceInflueCaracteristique->setCaracteristique($this);
        }

        return $this;
    }

    public function removeCompetenceInflueCaracteristique(CompetenceInflueCaracteristique $competenceInflueCaracteristique): static
    {
        if ($this->competenceInflueCaracteristiques->removeElement($competenceInflueCaracteristique)) {
            // set the owning side to null (unless already changed)
            if ($competenceInflueCaracteristique->getCaracteristique() === $this) {
                $competenceInflueCaracteristique->setCaracteristique(null);
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
            $session->addCaracteristique($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            $session->removeCaracteristique($this);
        }

        return $this;
    }

    public function __toString() 
    {
        return $this->name;
    }
}
