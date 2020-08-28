<?php
//namespace src\controller;
require_once "src/entity/Physique.php";

use libs\system\Controller;
use src\model\MoralDb;
use src\model\PhysiqueDb;
//use src\entity\Moral;

class PhysiqueController extends Controller
{

    /** 
     * use: localhost/ORM/Physique/
     */
    public function index(){  
        return $this->view->load("physique/index");   
    }  

    public function save()
    {
        if (isset($_POST['ajouter'])) {
            $physiquedao = new PhysiqueDb;
            extract($_POST);
            $physique = new Physique();
            $physique->setPrenom($prenom);
            $physique->setNom($nom);
            $physique->setAdress($adress);
            $physique->setEmail($email);
            $physique->setTelephone($telephone);
            $physique->setSexe($sexe);
            $physique->setProfession($profession);
            $physique->setCni($cni);
            $physique->setSalaire($salaire);
            $physique->setSexe($sexe);

            $physique->setMoral($physiquedao->getMoral($moral)[0]);
            
            
            $physiquedao->insert($physique);

            header('Location:getAll');
        }
        return $this->view->load("physique/add");
    }

    public function getAll()
    {
        $physiquedao = new PhysiqueDb;
        $physique = $physiquedao->findAll();
        //return $this->view->load("physique/getAll", $physique);

        $retour["success"] = true;
        $retour["message"] = "Voici les clients physiques";
        $retour["results"]["nombre"] = count($physique);
        $retour["results"]["physiquex"] = $physique;

        for ($i=0; $i < count($physique); $i++) { 
            $phy = [
                "id"=> $physique[$i]->getId(),
                "prenom"=> $physique[$i]->getPrenom(),
                "nom"=> $physique[$i]->getNom(),
                "adress"=> $physique[$i]->getAdress(),
                "email"=> $physique[$i]->getEmail(),
                "telephone"=> $physique[$i]->getTelephone(),
                "sexe"=> $physique[$i]->getSexe(),
                "profession"=> $physique[$i]->getProfession(),
                "cni"=> $physique[$i]->getCni(),
                "salaire"=> $physique[$i]->getSalaire(),
                "moral"=> $physique[$i]->getMoral(),

            ];
            $retour["results"]["physiques"][$i] = $phy;

        }
        echo json_encode($retour);
    }
    

    public function add()
    {
        $moraldao = new MoralDb;
        $moral = $moraldao->findAll();
        return $this->view->load("physique/add", $moral);
    }
}
