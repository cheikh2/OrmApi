<?php
namespace src\model;

use libs\system\Model;

class CompteDb extends Model
{
    public function findAll(){
        return $this->entityManager
                    ->createQuery("SELECT c FROM Compte c")
                    ->getResult();
    }

    public function get($id)
    {
        return $this->entityManager
            ->createQuery("SELECT c FROM Compte c WHERE c.id = " . $id)
            ->getResult();
    }

    public function insert($compte){
        $this->entityManager->persist($compte);
        $this->entityManager->flush();
    }

    public function getMoral($id)
    {
        return $this->entityManager
            ->createQuery("SELECT m FROM Moral m WHERE m.id = " . $id)
            ->getResult();
    }
    public function getOperations($numCompte)
    {
        return $this->entityManager
        ->createQuery("SELECT o,c FROM Operation o, Compte c WHERE c.numCompte=".$id." AND c.id=o.compte_id")
        //SELECT * FROM Operation o, Compte c WHERE c.numCompte=CCCCC AND c.id=o.compte_id
        ->getResult();
    }
}
