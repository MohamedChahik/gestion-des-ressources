<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResMarqueRepository")
 */
class ResMarque
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
     * @ORM\OneToMany(targetEntity="App\Entity\ResMateriel", mappedBy="marque")
     */
    private $materiel;

    public function __construct()
    {
        $this->materiel = new ArrayCollection();
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
            $materiel->setMarque($this);
        }

        return $this;
    }

    public function removeMateriel(ResMateriel $materiel): self
    {
        if ($this->materiel->contains($materiel)) {
            $this->materiel->removeElement($materiel);
            // set the owning side to null (unless already changed)
            if ($materiel->getMarque() === $this) {
                $materiel->setMarque(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}
