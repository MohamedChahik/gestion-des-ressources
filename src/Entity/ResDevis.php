<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResDevisRepository")
 */
class ResDevis
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
     * @ORM\Column(type="integer")
     */
    private $cout;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ResDemande", cascade={"persist", "remove"})
     */
    private $demande;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResMateriel", inversedBy="resDevis")
     */
    private $materiel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResService", inversedBy="resDevis")
     */
    private $service;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResEntreprise", inversedBy="resDevis")
     */
    private $entreprise;

    public function __construct()
    {
        $this->materiel = new ArrayCollection();
        $this->service = new ArrayCollection();
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

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getDemande(): ?ResDemande
    {
        return $this->demande;
    }

    public function setDemande(?ResDemande $demande): self
    {
        $this->demande = $demande;

        return $this;
    }

    /**
     * @return Collection|ResMateriel[]
     */
    public function getMateriel(): Collection
    {
        return $this->materiel;
    }

    public function addMateriel(ResMateriel $materiel): self
    {
        if (!$this->materiel->contains($materiel)) {
            $this->materiel[] = $materiel;
        }

        return $this;
    }

    public function removeMateriel(ResMateriel $materiel): self
    {
        if ($this->materiel->contains($materiel)) {
            $this->materiel->removeElement($materiel);
        }

        return $this;
    }

    /**
     * @return Collection|ResService[]
     */
    public function getService(): Collection
    {
        return $this->service;
    }

    public function addService(ResService $service): self
    {
        if (!$this->service->contains($service)) {
            $this->service[] = $service;
        }

        return $this;
    }

    public function removeService(ResService $service): self
    {
        if ($this->service->contains($service)) {
            $this->service->removeElement($service);
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
