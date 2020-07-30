<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResEntrepriseRepository")
 */
class ResEntreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $ville;

    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_postal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResDemande", mappedBy="entreprise")
     */
    private $resDemandes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResDevis", mappedBy="entreprise")
     */
    private $resDevis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResIntervention", mappedBy="entreprise")
     */
    private $resInterventions;

    public function __construct()
    {
        $this->resDemandes = new ArrayCollection();
        $this->resDevis = new ArrayCollection();
        $this->resInterventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }

    /**
     * @return Collection|ResDemande[]
     */
    public function getResDemandes(): Collection
    {
        return $this->resDemandes;
    }

    public function addResDemande(ResDemande $resDemande): self
    {
        if (!$this->resDemandes->contains($resDemande)) {
            $this->resDemandes[] = $resDemande;
            $resDemande->setEntreprise($this);
        }

        return $this;
    }

    public function removeResDemande(ResDemande $resDemande): self
    {
        if ($this->resDemandes->contains($resDemande)) {
            $this->resDemandes->removeElement($resDemande);
            // set the owning side to null (unless already changed)
            if ($resDemande->getEntreprise() === $this) {
                $resDemande->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ResDevis[]
     */
    public function getResDevis(): Collection
    {
        return $this->resDevis;
    }

    public function addResDevi(ResDevis $resDevi): self
    {
        if (!$this->resDevis->contains($resDevi)) {
            $this->resDevis[] = $resDevi;
            $resDevi->setEntreprise($this);
        }

        return $this;
    }

    public function removeResDevi(ResDevis $resDevi): self
    {
        if ($this->resDevis->contains($resDevi)) {
            $this->resDevis->removeElement($resDevi);
            // set the owning side to null (unless already changed)
            if ($resDevi->getEntreprise() === $this) {
                $resDevi->setEntreprise(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ResIntervention[]
     */
    public function getResInterventions(): Collection
    {
        return $this->resInterventions;
    }

    public function addResIntervention(ResIntervention $resIntervention): self
    {
        if (!$this->resInterventions->contains($resIntervention)) {
            $this->resInterventions[] = $resIntervention;
            $resIntervention->setEntreprise($this);
        }

        return $this;
    }

    public function removeResIntervention(ResIntervention $resIntervention): self
    {
        if ($this->resInterventions->contains($resIntervention)) {
            $this->resInterventions->removeElement($resIntervention);
            // set the owning side to null (unless already changed)
            if ($resIntervention->getEntreprise() === $this) {
                $resIntervention->setEntreprise(null);
            }
        }

        return $this;
    }
}
