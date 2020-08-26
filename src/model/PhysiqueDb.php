<?php
namespace src\model;

use libs\system\Model;

class PhysiqueDb extends Model
{
    
    public function findAll(){
        return $this->entityManager
                    ->createQuery("SELECT p FROM Physique p")
                    ->getResult();
    }

    // public function findAllMo()
    // {
    //     return $this->entityManager
    //         ->createQuery("SELECT m FROM Moral m")
    //         ->getResult();
    // }
    // public function getMoral($id){
    //     return $this->entityManager
    //                 ->createQuery("SELECT m FROM Moral WHERE id=>$id")
    //                 ->getResult();
    // }

    public function insert($physique){
        $this->entityManager->persist($physique);
        $this->entityManager->flush();
    }

    public function get($id)
    {
        return $this->entityManager
            ->createQuery("SELECT p FROM Physique p WHERE p.id = " . $id)
            ->getResult();
    }

    public function getMoral($id)
    {
        return $this->entityManager
            ->createQuery("SELECT m FROM Moral m WHERE m.id = " . $id)
            ->getResult();
    }

    public function update($physique)
    {
        $p = $this->entityManager->find('Physique', $physique->getId());
        $p->setPrenom($physique->getPrenom());
        $p->setNom($physique->getNom());
        $p->setAdress($physique->getAdress());
        $p->setEmail($physique->getEmail());
        $p->setTelephone($physique->getTelephone());
        $p->setSexe($physique->getSexe());
        $p->setProfession($physique->getProfession());
        $p->setCni($physique->getCni());
        $p->setSalaire($physique->getSalaire());
        $p->setMoral($physique->getMoral());

        $this->entityManager->flush();
    }

    public function delete($id){
        //$m = $this->get($id);
        $p = $this->entityManager->find('Physique', $id);
        $this->entityManager->remove($p);
        $this->entityManager->flush();
    }
}
