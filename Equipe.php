<?php
class Equipe {
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of lLogin
 *
 * @author Lacoste
 */

    private $userName;
    private $password;
    private $niveauUtilisateur;
    
    public function getName() {
       return $this->userName;  
    }
    public function setName($value) {
        $this->userName=$value;
    }
    
    public function getPassword() {
       return $this->password;  
    }
    public function setPassword($value) {
        $this->password=$value;
    }
    
    public function getAdmin() {
       return $this->niveauUtilisateur;  
    }
    public function setAdmin($value) {
        $this->niveauUtilisateur=$value;
    }
    
    public function getEmail() {
       return $this->addresemail;  
    }
    public function setEmail($value) {
        $this->adressemail=$value;
    }
}
