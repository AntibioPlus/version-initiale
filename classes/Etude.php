<?php
/**
 * Description of liste_molecule
 *
 * @author Sylvie Hupin
 */
class Etude {
    //put your code here
    private $id;
    private $libelle;
    private $date_debut;
    private $date_fin;
    private $isFinish;
    
    public function getId() {
       return $this->id;  
    }
    public function setId($id) {
       $this->id = $id;
    }
    public function getLibelle() {
       return $this->libelle;  
    }
    public function setLibelle($libelle) {
       $this->libelle = $libelle;
    }
    
    public function getDateDebut() {
       return $this->date_debut;  
    }
    public function setDateDebut($date_debut) {
       $this->date_debut = $date_debut;
    }
     public function getDateFin() {
       return $this->date_fin;  
    }
    public function setDateFin($date_fin) {
       $this->date_fin = $date_fin;
    }
    public function getIsFinish() {
       return $this->isFinish;  
    }
    public function setIsFinish($isFinish) {
       $this->isFinish = $isFinish;
    }
    public function __construct($libelle, $date_debut, $date_fin, $isFinish) {           
        $this->libelle = $libelle;    
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;    
        $this->isFinish = $isFinish;  
    }
    
    public function enregistrerEtude($molecule,$bacterie,$antibiotique,$equipe) {
       
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("insert into etude(libelle, date_debut, date_fin, isFinish) value (:libelle, :date_debut, :date_fin, :isFinish) ");
     
        $req->bindParam(":libelle",$this->libelle);
        $req->bindParam(":date_debut",$this->date_debut);
        $req->bindParam(":date_fin",$this->date_fin);
        $req->bindParam(":isFinish", $this->isFinish);
 
        
         
        //execution requete
        $req->execute();
     
        //recuperation dernier id créé
        $this->id = $bdb->lastInsertId();               
        
        foreach($molecule as $value) {
            $req=$bdb->prepare("insert into etude_has_molecules(etude_id, molecules_id) value (:id_etude,:id_molecule) ");
     
            $req->bindParam(":id_etude",$this->id);
            $req->bindParam(":id_molecule",$value);
         
            //execution requete
            $req->execute();     
        }
        
        foreach($bacterie as $value) {
            $req=$bdb->prepare("insert into etude_has_bacteries(etude_id, bacteries_id) value (:id_etude,:id_bacterie) ");
     
            $req->bindParam(":id_etude",$this->id);
            $req->bindParam(":id_bacterie",$value);
         
            //execution requete
            $req->execute();     
        }
         
         $i=0;        
         foreach($antibiotique as $value) {
            $req=$bdb->prepare("insert into equipe_has_etude(equipe_id,etude_id,antibiotiques_id) value (:id_equipe,:id_etude,:id_antibiotique) ");
     
            $req->bindParam(":id_etude",$this->id);
            $req->bindParam(":id_antibiotique",$value);
            $req->bindParam(":id_equipe",$equipe[$i]);
            
         
            //execution requete
            $req->execute();
            $i++;
        }
        
        //je ferme la connexion
        $db=null;
        }
    
    public static function getEtudes() {
       
        $bdb= new PDO("mysql:host=".Config::SERVEUR.";dbname=".Config::BASE,Config::UTILISATEUR,Config::MOTDEPASSE);
     
        $req=$bdb->prepare("select * from etude ");
        
        //execution requete
        $req->execute();

        $result = $req->fetchAll();
     
        $etudes = [];
        
        foreach ($result as $ligneEtude) {
           $etude = new Etude($ligneEtude["libelle"], $ligneEtude["date_debut"], $ligneEtude["date_fin"], $ligneEtude["isFinish"]);
           $etude->setId($ligneEtude["id"]);
           $etudes[] = $etude;
        }
        
        $bdb = null;
        return $etudes;
    }
}
