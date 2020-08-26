<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, Content-Type");
header('Content-Type: application/json; charset=UTF-8');
//namespace src\controller;
require_once "src/entity/Moral.php";

use libs\system\Controller;
use src\model\MoralDb;
//use src\entity\Moral;

class MoralController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        if (isset($_POST['ajouter'])) {
            extract($_POST);
            $moral = new Moral();
            $moral->setNomEmpl($nomEmpl);
            $moral->setNinea($ninea);
            $moral->setRc($rc);
            $moral->setRaisonSocial($raisonSocial);
            $moral->setAdressEmpl($adressEmpl);

            $moraldao = new MoralDb;
            $moraldao->insert($moral);

            header('Location:getAll');
        }
        return $this->view->load("moral/add");
    }

    public function edit($id)
    {
        $moraldao = new MoralDb;
        $moral = $moraldao->get($id);
        return $this->view->load("moral/edit", $moral);
    }

    ####--- Liste de tous les clients marals ---####
    public function getAll()
    {
        $moraldao = new MoralDb;
        $morals = $moraldao->findAll();
        //echo json_encode(array("response" => $moral));

        $retour["success"] = true;
        $retour["message"] = "Voici les clients moraux";
        $retour["results"]["nombre"] = count($morals);
        $retour["results"]["moraux"] = $morals;

        for ($i=0; $i < count($morals); $i++) { 
            $moraux = [
                "id"=> $morals[$i]->getId(),
                "nomEmpl"=> $morals[$i]->getNomEmpl(),
                "ninea"=> $morals[$i]->getNinea(),
                "rc"=> $morals[$i]->getRc(),
                "raisonSocial"=> $morals[$i]->getRaisonSocial(),
                "adressEmpl"=> $morals[$i]->getAdressEmpl()

            ];
            $retour["results"]["moraux"][$i] = $moraux;

        }

        /*foreach ($morals as $key => $value) {
            $mor = [
                "id"=> $value->getId(),
                "nomEmpl"=> $value->getNomEmpl()

            ];
            $retour["results"]["moraux"] = $mor;
            echo json_encode($retour);
        }*/
        echo json_encode($retour);
        
        
    }

    public function update()
    {
        if (isset($_POST['modifier'])) {
            extract($_POST);
            $moral = new Moral();
            $moral->setId($id);
            $moral->setNomEmpl($nomEmpl);
            $moral->setNinea($ninea);
            $moral->setRc($rc);
            $moral->setRaisonSocial($raisonSocial);
            $moral->setAdressEmpl($adressEmpl);

            $moraldao = new MoralDb;
            $moraldao->update($moral);

            header('Location:getAll');
        }
        return $this->view->load("moral/edit");
    }

    public function delete($id)
    {
        $moraldao = new MoralDb;
        $moraldao->delete($id);

        header('Location:getAll');
    }
}
