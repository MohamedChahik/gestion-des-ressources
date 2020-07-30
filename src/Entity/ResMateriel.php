<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResMaterielRepository")
 */
class ResMateriel
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResMarque", inversedBy="materiel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResType", inversedBy="materiel")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResDevis", mappedBy="materiel")
     */
    private $resDevis;

    public function __construct()
    {
        $this->technicien = new ArrayCollection();
        $this->resDevis = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMarque(): ?ResMarque
    {
        return $this->marque;
    }

    public function setMarque(?ResMarque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getType(): ?ResType
    {
        return $this->type;
    }

    public function setType(?ResType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

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
            $resDevi->addMateriel($this);
        }

        return $this;
    }

    public function removeResDevi(ResDevis $resDevi): self
    {
        if ($this->resDevis->contains($resDevi)) {
            $this->resDevis->removeElement($resDevi);
            $resDevi->removeMateriel($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
