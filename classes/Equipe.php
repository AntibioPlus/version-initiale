<?php

/**
 * Description of Bacterie
 *
 * @author Sylvie Hupin
 */
class Equipe {
    //put your code here
    private $id;
    private $nom;
    private $password;
    private $admin;
    private $email;
    
    public function getId() {
       return $this->id;  
    }
    public function setId($value) {
        $this->id=$value;
    }
    public function getNom() {
       return $this->nom;  
    }
    public function setNom($value) {
        $this->nom=$value;
    }
    public function getPassword() {
       return $this->password;  
    }
    public function setPassword($value) {
        $this->password=$value;
    }
    public function getAdmin() {
       return $this->admin;  
    }
    public function setAdmin($value) {
        $this->admin=$value;
    }
    public function getEmail() {
       return $this->email;  
    }
    public function setEmail($value) {
        $this->email=$value;
    }
    public function __construct($id, $nom, $admin, $email) {
        $this->id=$id;
        $this->nom=$nom;
        $this->admin=$admin;
        $this->email=$email;
    }
    public static function getEquipe($nom, $password) {
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("select * from equipe where nom = :nom_utilisateur AND password = :mot_de_passe");
     
        $req->bindParam(":nom_utilisateur",$nom);
        $req->bindParam(":mot_de_passe",$password);
     
        $req->execute();
        
        $result = $req->fetch();
        
        $bdb = null;
        return $result;
        
    }
    
    public static function getEquipes() {
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("select * from equipe");
     
        $req->execute();
        
        $result = $req->fetchall();
        
        $equipes = [];
        
        foreach ($result as $ligneEquipe) {
           $equipe = new Equipe($ligneEquipe["id"],$ligneEquipe["nom"],$equipe = $ligneEquipe["admin"],$equipe = $ligneEquipe["email"]);
           $equipes[] = $equipe;
        }
        
        $bdb = null;
        return $equipes;
        
    }
    
}
