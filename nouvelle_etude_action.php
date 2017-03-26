<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'classes/etude.php';
include_once 'config.php';

session_start();
$libelle = $_SESSION["libelle"];
$dateDebut =    $_SESSION["dateDebut"];
$dateFin =    $_SESSION["dateFin"];  

$etude = new Etude ($libelle,$dateDebut,$dateFin, 0);

$molecule  = $_POST["molecule"];
$bacterie = $_POST["bacterie"];
$antibiotique = $_POST["antibiotique"];
//$equipe = $_POST["option"];

foreach ($_POST["option"] as $value) {
    if ($value != "") {
        $equipe [] = $value;
    }
}

   
$etude->enregistrerEtude($molecule,$bacterie,$antibiotique,$equipe);

$etude->getId();

header("Location: Gestion_Administrateur.php");
die();

