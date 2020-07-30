<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResServiceRepository")
 */
class ResService
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
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ResDevis", mappedBy="service")
     */
    private $resDevis;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResTypeService", inversedBy="resServices")
     */
    private $typeservice;

    public function __construct()
    {
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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

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
            $resDevi->addService($this);
        }

        return $this;
    }

    public function removeResDevi(ResDevis $resDevi): self
    {
        if ($this->resDevis->contains($resDevi)) {
            $this->resDevis->removeElement($resDevi);
            $resDevi->removeService($this);
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }

    public function getTypeservice(): ?ResTypeService
    {
        return $this->typeservice;
    }

    public function setTypeservice(?ResTypeService $typeservice): self
    {
        $this->typeservice = $typeservice;

        return $this;
    }
}
