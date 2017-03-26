<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of liste_molecule
 *
 * @author Sylvie Hupin
 */
class Antibiotique {
    //put your code here
          private $id;
    private $nom;
    
    public function getId() {
       return $this->id;  
    }
    public function setId($value) {
        $this->id=$value;
    }
    public function getNom() {
       return $this->nom;  
    }
    public function setNom($nom) {
       $this->nom = $nom;
    }
    public function __construct($id,$nom) {
        $this->id = $id;
        $this->nom = $nom;     
    }
    
    public static function getAntibiotique() {
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("select * from antibiotiques");
     
        $req->execute();
        
        $result = $req->fetchAll();
     
        $antibiotiques = [];
        
        foreach ($result as $ligneAntibiotique) {
           $antibiotique = new Antibiotique($ligneAntibiotique["id"],$ligneAntibiotique["nom"]);
           $antibiotiques[] = $antibiotique;
        }
        
        $bdb = null;
        return $antibiotiques;
        
    }
}
