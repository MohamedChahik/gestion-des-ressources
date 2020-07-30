<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResTypeServiceRepository")
 */
class ResTypeService
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
     * @ORM\OneToMany(targetEntity="App\Entity\ResService", mappedBy="typeservice")
     */
    private $resServices;

    public function __construct()
    {
        $this->resServices = new ArrayCollection();
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

    /**
     * @return Collection|ResService[]
     */
    public function getResServices(): Collection
    {
        return $this->resServices;
    }

    public function addResService(ResService $resService): self
    {
        if (!$this->resServices->contains($resService)) {
            $this->resServices[] = $resService;
            $resService->setTypeservice($this);
        }

        return $this;
    }

    public function removeResService(ResService $resService): self
    {
        if ($this->resServices->contains($resService)) {
            $this->resServices->removeElement($resService);
            // set the owning side to null (unless already changed)
            if ($resService->getTypeservice() === $this) {
                $resService->setTypeservice(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
