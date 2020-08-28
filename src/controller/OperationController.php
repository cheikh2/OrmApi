<?php
header('Content-Type: application/json; charset=UTF-8');
//namespace src\controller;
require_once "src/entity/Operation.php";

use libs\system\Controller;
use src\model\OperationDb;
//use src\model\MoralDb;

//use src\entity\Moral;

class OperationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $operationdao = new OperationDb;
        $operation = $operationdao->findAll();
        //return $this->view->load("compte/getAll", $compte);

        $retour["success"] = true;
        $retour["message"] = "Voici les operations";
        $retour["results"]["nombre"] = count($operation);
        $retour["results"]["operations"] = $operation;

        for ($i=0; $i < count($operation); $i++) { 
            $oper = [
                "id"=> $operation[$i]->getId(),
                "montant"=> $operation[$i]->getMontant(),
                "compte"=> $operation[$i]->getCompte()->getNumCompte(),
                "typeOperations"=> $operation[$i]->gettypeOperations()->getLibelle(),

            ];
            $retour["results"]["operations"][$i] = $oper;

        }
        echo json_encode($retour);
    }
    

    public function getId()
    {
        $operationdao = new OperationDb;
        $operation = $operationdao->getOp();
    }

    public function getOper($numCompte)
    {
        $operationdao = new OperationDb;
        $operation = $operationdao->getOperations($numCompte);

        echo json_encode($operation);
    }
}