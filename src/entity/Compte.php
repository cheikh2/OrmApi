<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Compte")
 */
class Compte
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
    private $numAgence;

    /**
     * @ORM\Column(type="string")
     */
    private $numCompte;

    /**
     * @ORM\Column(type="string")
     */
    private $rib;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity="TypeCompte", inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $typeComptes;

     /**
     * @ORM\ManyToOne(targetEntity="Moral", inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $morals;

    /**
     * @ORM\ManyToOne(targetEntity="Physique", inversedBy="comptes")
     * @ORM\JoinColumn(nullable=true)
     */
    private $physiques;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->typeComptes = new ArrayCollection();
        $this->morals = new ArrayCollection();
        $this->physiques = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNumAgence()
    {
        return $this->numAgence;
    }

    public function setNumAgence($numAgence)
    {
        $this->numAgence = $numAgence;
    }

    public function getNumCompte()
    {
        return $this->numCompte;
    }

    public function setNumCompte($numCompte)
    {
        $this->numCompte = $numCompte;
    }

    public function getRib()
    {
        return $this->rib;
    }

    public function setRib($rib)
    {
        $this->rib = $rib;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    public function getDateFin()
    {
        return $this->dateFin;
    }

    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }
    public function getTypeComptes()
    {
        return $this->typeComptes;
    }
    public function setTypeComptes($typeComptes)
    {
        $this->typeComptes = $typeComptes;
    }
    public function getMorals()
    {
        return $this->morals;
    }
    public function setMorals($morals)
    {
        $this->morals = $morals;
    }

    public function getPhysiques()
    {
        return $this->physiques;
    }
    public function setPhysique($physiques)
    {
        $this->physiques = $physiques;
    }
}
