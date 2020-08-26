<?php

namespace src\model;

use libs\system\Model;

class MoralDb extends Model
{
    public function findAll()
    {
        return $this->entityManager
            ->createQuery("SELECT m FROM Moral m")
            ->getResult();
    }

    public function get($id)
    {
        return $this->entityManager
            ->createQuery("SELECT m FROM Moral m WHERE m.id = " . $id)
            ->getResult();
    }

    public function insert($moral)
    {
        $this->entityManager->persist($moral);
        $this->entityManager->flush();
    }

    public function update($moral)
    {
        $m = $this->entityManager->find('Moral', $moral->getId());
        $m->setNomEmpl($moral->getNomEmpl());
        $m->setNinea($moral->getNinea());
        $m->setRc($moral->getRc());
        $m->setRaisonSocial($moral->getRaisonSocial());
        $m->setAdressEmpl($moral->getAdressEmpl());

        $this->entityManager->flush();
    }

    public function delete($id){
        //$m = $this->get($id);
        $m = $this->entityManager->find('Moral', $id);
        $this->entityManager->remove($m);
        $this->entityManager->flush();
    }
}

