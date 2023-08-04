<?php

namespace App\Entity;

use App\Repository\PersoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersoRepository::class)]
class Perso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $espece = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origine = null;

    #[ORM\Column(length: 255)]
    private ?string $age = null;

    #[ORM\Column]
    private ?int $sante = null;

    #[ORM\Column]
    private ?int $santeMax = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $poids = null;

    #[ORM\Column(length: 255)]
    private ?string $sexe = null;

    #[ORM\OneToMany(mappedBy: 'Perso', targetEntity: CaracteristiquePerso::class, orphanRemoval: true)]
    private Collection $caracteristiquePersos;

    #[ORM\OneToMany(mappedBy: 'Perso', targetEntity: CompetencePerso::class, orphanRemoval: true)]
    private Collection $competencePersos;

    #[ORM\OneToMany(mappedBy: 'perso', targetEntity: Item::class)]
    private Collection $Inventaire;

    #[ORM\ManyToMany(targetEntity: Session::class, mappedBy: 'Persos')]
    private Collection $sessions;

    public function __construct()
    {
        $this->caracteristiquePersos = new ArrayCollection();
        $this->competencePersos = new ArrayCollection();
        $this->Inventaire = new ArrayCollection();
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

    public function getEspece(): ?string
    {
        return $this->espece;
    }

    public function setEspece(?string $espece): static
    {
        $this->espece = $espece;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(?string $origine): static
    {
        $this->origine = $origine;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getSante(): ?int
    {
        return $this->sante;
    }

    public function setSante(int $sante): static
    {
        $this->sante = $sante;

        return $this;
    }

    public function getSanteMax(): ?int
    {
        return $this->santeMax;
    }

    public function setSanteMax(int $santeMax): static
    {
        $this->santeMax = $santeMax;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPoids(): ?string
    {
        return $this->poids;
    }

    public function setPoids(?string $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): static
    {
        $this->sexe = $sexe;

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
            $caracteristiquePerso->setPerso($this);
        }

        return $this;
    }

    public function removeCaracteristiquePerso(CaracteristiquePerso $caracteristiquePerso): static
    {
        if ($this->caracteristiquePersos->removeElement($caracteristiquePerso)) {
            // set the owning side to null (unless already changed)
            if ($caracteristiquePerso->getPerso() === $this) {
                $caracteristiquePerso->setPerso(null);
            }
        }

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
            $competencePerso->setPerso($this);
        }

        return $this;
    }

    public function removeCompetencePerso(CompetencePerso $competencePerso): static
    {
        if ($this->competencePersos->removeElement($competencePerso)) {
            // set the owning side to null (unless already changed)
            if ($competencePerso->getPerso() === $this) {
                $competencePerso->setPerso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getInventaire(): Collection
    {
        return $this->Inventaire;
    }

    public function addInventaire(Item $inventaire): static
    {
        if (!$this->Inventaire->contains($inventaire)) {
            $this->Inventaire->add($inventaire);
            $inventaire->setPerso($this);
        }

        return $this;
    }

    public function removeInventaire(Item $inventaire): static
    {
        if ($this->Inventaire->removeElement($inventaire)) {
            // set the owning side to null (unless already changed)
            if ($inventaire->getPerso() === $this) {
                $inventaire->setPerso(null);
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
            $session->addPerso($this);
        }

        return $this;
    }

    public function removeSession(Session $session): static
    {
        if ($this->sessions->removeElement($session)) {
            $session->removePerso($this);
        }

        return $this;
    }
}
