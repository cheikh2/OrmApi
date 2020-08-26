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
        return $this->view->load("compte/getAll", $compte);
    }
    

    public function add()
    {
        $moraldao = new MoralDb;
        $moral = $moraldao->findAll();
        return $this->view->load("compte/add", $moral);
    }
}