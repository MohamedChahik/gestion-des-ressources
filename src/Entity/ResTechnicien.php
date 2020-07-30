<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResTechnicienRepository")
 */
class ResTechnicien
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResIntervention", mappedBy="technicien")
     */
    private $technicien;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResIntervention", mappedBy="technicien")
     */
    private $resInterventions;

    public function __construct()
    {
        $this->technicien = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
            $resIntervention->addTechnicien($this);
        }

        return $this;
    }

    public function removeResIntervention(ResIntervention $resIntervention): self
    {
        if ($this->resInterventions->contains($resIntervention)) {
            $this->resInterventions->removeElement($resIntervention);
            $resIntervention->removeTechnicien($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
