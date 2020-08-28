<?php
//namespace src\controller;
require_once "src/entity/Compte.php";

use libs\system\Controller;
use src\model\CompteDb;
use src\model\MoralDb;

//use src\entity\Moral;

class CompteController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * localhost/Compte/save
     */
    public function save()
    {
        if (isset($_POST['ajouter'])) {
            extract($_POST);
            $compte = new Compte();
            $compte->setNumAgence($numAgence);
            $compte->setNumCompte($numCompte);
            $compte->setRib($rib);
            $compte->setMontant($montant);

            $comptedao = new CompteDb;
            $comptedao->insert($compte);

            header('Location:getAll');
        }
        return $this->view->load("compte/add");
    }

    public function getAll()
    {
        $comptedao = new CompteDb;
        $compte = $comptedao->findAll();
        //return $this->view->load("compte/getAll", $compte);

        $retour["success"] = true;
        $retour["message"] = "Voici les comptes";
        $retour["results"]["nombre"] = count($compte);
        $retour["results"]["comptes"] = $compte;

        for ($i=0; $i < count($compte); $i++) { 
            $comp = [
                "id"=> $compte[$i]->getId(),
                "numAgence"=> $compte[$i]->getNumAgence(),
                "numCompte"=> $compte[$i]->getNumCompte(),
                "rib"=> $compte[$i]->getRib(),
                "montant"=> $compte[$i]->getMontant(),
                "dateDebut"=> $compte[$i]->getDateDebut(),
                "dateFin"=> $compte[$i]->getDateFin(),
                "typeComptes"=> $compte[$i]->getTypeComptes(),
                "morals"=> $compte[$i]->getMorals(),
                "physiques"=> $compte[$i]->getPhysiques()

            ];
            $retour["results"]["comptes"][$i] = $comp;

        }
        echo json_encode($retour);
    }
    

    public function add()
    {
        $moraldao = new MoralDb;
        $moral = $moraldao->findAll();
        return $this->view->load("compte/add", $moral);
    }

    public function getNum($numCompte)
    {
        $comptedao = new CompteDb;
        $compte = $comptedao->getOperations();
        //return $this->view->load("compte/getAll", $compte);

        $retour["success"] = true;
        $retour["message"] = "Voici les operation";
        $retour["results"]["nombre"] = count($compte);
        $retour["results"]["comptes"] = $compte;

        for ($i=0; $i < count($compte); $i++) { 
            $comp = [
                "id"=> $compte[$i]->getId(),
                // "numAgence"=> $compte[$i]->getNumAgence(),
                // "numCompte"=> $compte[$i]->getNumCompte(),
                // "rib"=> $compte[$i]->getRib(),
                // "montant"=> $compte[$i]->getMontant(),
                // "dateDebut"=> $compte[$i]->getDateDebut(),
                // "dateFin"=> $compte[$i]->getDateFin(),
                // "typeComptes"=> $compte[$i]->getTypeComptes(),
                // "morals"=> $compte[$i]->getMorals(),
                // "physiques"=> $compte[$i]->getPhysiques()

            ];
            $retour["results"]["comptes"][$i] = $comp;

        }
        echo json_encode($retour);
    }
}