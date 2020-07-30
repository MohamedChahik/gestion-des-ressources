<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResInterventionRepository")
 */
class ResIntervention
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResTechnicien", inversedBy="resInterventions")
     */
    private $technicien;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResEntreprise", inversedBy="resInterventions")
     */
    private $entreprise;

    public function __construct()
    {
        $this->technicien = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|ResTechnicien[]
     */
    public function getTechnicien(): Collection
    {
        return $this->technicien;
    }

    public function addTechnicien(ResTechnicien $technicien): self
    {
        if (!$this->technicien->contains($technicien)) {
            $this->technicien[] = $technicien;
        }

        return $this;
    }

    public function removeTechnicien(ResTechnicien $technicien): self
    {
        if ($this->technicien->contains($technicien)) {
            $this->technicien->removeElement($technicien);
        }

        return $this;
    }

    public function getEntreprise(): ?ResEntreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?ResEntreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
}
