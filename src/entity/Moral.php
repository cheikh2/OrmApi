<?php
//namespace src\entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity 
 * @ORM\Table(name="Moral")
 **/
class Moral
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
    private $nomEmpl;

    /**
     * @ORM\Column(type="string")
     */
    private $ninea;

    /**
     * @ORM\Column(type="string")
     */
    private $rc;

    /**
     * @ORM\Column(type="string")
     */
    private $raisonSocial;

    /**
     * @ORM\Column(type="string")
     */
    private $adressEmpl;

    /**
     * One moral has many physiques. This is the inverse side.
     * @ORM\OneToMany(targetEntity="Physique", mappedBy="moral")
     */
    private $physiques;

    public function __construct()
    {
        $this->physiques = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNomEmpl()
    {
        return $this->nomEmpl;
    }


    public function setNomEmpl($nomEmpl)
    {
        $this->nomEmpl = $nomEmpl;

        return $this;
    }

    public function getNinea()
    {
        return $this->ninea;
    }

    public function setNinea($ninea)
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getRc()
    {
        return $this->rc;
    }

    public function setRc($rc)
    {
        $this->rc = $rc;

        return $this;
    }

    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;

        return $this;
    }

    public function getAdressEmpl()
    {
        return $this->adressEmpl;
    }

    public function setAdressEmpl($adressEmpl)
    {
        $this->adressEmpl = $adressEmpl;

        return $this;
    }

    public function getPhysiques()
    {
        return $this->physiques;
    }
    public function setPhysiques($physiques)
    {
        $this->physiques = $physiques;
    }
}
