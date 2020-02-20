<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantsRepository")
 */
class Enfants
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

     /**
     * @ORM\Column(type="boolean")
     */
    private $accompagnants;

     /**
     * @ORM\Column(type="integer")
     */
    private $idatelier;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAccompagnants(): ?bool
    {
        return $this->accompagnants;
    }

    public function setAccompagnants(bool $accompagnants): self
    {
        $this->accompagnants = $accompagnants;

        return $this;
    }

    public function getIdatelier(): ?int
    {
        return $this->idatelier;
    }

    public function setIdatelier(int $idatelier): self
    {
        $this->idatelier = $idatelier;

        return $this;
    }

}