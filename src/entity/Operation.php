<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Operation")
 */
class Operation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity="Compte", inversedBy="operations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity="TypeOperation", inversedBy="operations")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeOperations;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->typeOperations = new ArrayCollection();
        $this->typeOperations = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    
    public function getTypeOperations()
    {
        return $this->typeOperations;
    }
    public function setTypeOperations($typeOperations)
    {
        $this->typeOperations = $typeOperations;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }
}
