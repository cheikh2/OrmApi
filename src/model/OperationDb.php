<?php
namespace src\model;

use libs\system\Model;

class OperationDb extends Model
{
    public function findAll(){
        return $this->entityManager
                    ->createQuery("SELECT o FROM Operation o")
                    ->getResult();
    }

    public function get($id)
    {
        return $this->entityManager
            ->createQuery("SELECT o FROM Operation o WHERE o.id = " . $id)
            ->getResult();

    }

    public function insert($operation){
        $this->entityManager->persist($operation);
        $this->entityManager->flush();
    }

    public function getTypeOperation($id)
    {
        return $this->entityManager
            ->createQuery("SELECT t FROM TypeOperation t WHERE t.id = " . $id)
            ->getResult();
    }

    public function getOp($id)
    {
        return $this->entityManager
            ->createQuery("SELECT * FROM Operation WHERE compte_id =". $id)
            ->getResult();
    } 

    public function getOperations($numCompte)
    {
        return $this->entityManager
        ->createQuery("SELECT c.numCompte, o.montant, t.libelle 
        FROM Operation o, Compte c, TypeOperation t 
        WHERE c.numCompte='".$numCompte."' AND o.compte=c.id AND o.typeOperations=t.id")
        ->getResult();

        /*
        $query = $entityManager->createQuery("SELECT o
        FROM Operation o JOIN o.compte c
        WHERE c.NumCompte =:numero
        ")->setParameter('numero',$numcompte)->getResult();
        */
    }
}
