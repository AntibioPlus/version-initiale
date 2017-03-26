<?php
/**
 * Description of Bacterie
 *
 * @author Sylvie Hupin
 */
class Bacterie {
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
    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;       
    }
    
    public static function getBacterie() {
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("select * from bacteries");
     
        $req->execute();
        
        $result = $req->fetchAll();
     
        $bacteries = [];
        
        foreach ($result as $ligneBacterie) {
           $bacterie = new Bacterie($ligneBacterie["id"],$ligneBacterie["nom"]);
           $bacteries[] = $bacterie;
        }
        
        $bdb = null;
        return $bacteries;
        
    }
    
   }
