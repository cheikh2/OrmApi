<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../bootstrap.php';

$compte = new Compte;

$compte->setNumAgence("numOrmAgence2");
$compte->setNumCompte("numOrmCompte2");
$compte->setRib("ribOrm2");
$compte->setMontant(2000000);
/*$compte->setDateDebut(date("Y-m-d", strtotime("2020-12-11")));
$compte->setDateFin(date("Y-m-d", strtotime("2025-12-11")));*/

//var_dump($compte);

$entityManager->persist($compte);
$entityManager->flush();

echo $compte->getId();


