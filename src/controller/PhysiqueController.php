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
        return $this->view->load("physique/getAll", $physique);
    }
    

    public function add()
    {
        $moraldao = new MoralDb;
        $moral = $moraldao->findAll();
        return $this->view->load("physique/add", $moral);
    }
}
