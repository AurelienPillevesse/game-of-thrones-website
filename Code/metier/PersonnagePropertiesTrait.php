<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

trait PersonnagePropertiesTrait {
    
    
    public function getId() {
        return strval($this->id);
    }
    
    public function getNom() {
        return html_entity_decode($this->nom, ENT_QUOTES, "UTF-8");
    }
    public function getDescription() {
        return html_entity_decode($this->description, ENT_QUOTES, "UTF-8");
    }
    public function getAge() {
        return html_entity_decode($this->age, ENT_QUOTES, "UTF-8");
    }
    public function getNbImage() {
        return $this->nbImage;
    }
    
    public function setId ($id) {
        $pattern = '/^[0-9a-f]{10}$/';
        if(!isset($id) || !preg_match($pattern, $id)) {
            throw new Exception("Erreur identifiant incorrect");
        }
        $this->id = $id;
    }
    
    public function setNom($nom) {
        $escaped = htmlentities($nom, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 50)) {
            throw new Exception("Erreur le titre doit contenir entre 1 et 50 caractères alphanumériques.");
        }
        $this->nom = empty($escaped) ? "" : $escaped;
    }
    
    public function setDescription($description) {
        $escaped = htmlentities($description, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 1000)) {
            throw new Exception("Erreur le contenu doit contenir entre 1 et 1000 caractères alphanumériques.");
        }
        $this->description = empty($escaped) ? "" : $escaped;
    }
    
    public function setAge($age) {
        $escaped = htmlentities($age, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 100)) {
            throw new Exception("Erreur le contenu doit contenir entre 1 et 100 caractères alphanumériques.");
        }
        $this->age = empty($escaped) ? "" : $escaped;
    }
    
    public function setNbImage($nbImage) {
        $this->nbImage = $nbImage;
    }
    
    public function isValidRegexWithNumbers($chaine, $min, $max) {
        $regNumber = '/^([a-zA-Z0-9]|(\&[a-zA-Z]grave\;)|(\&[a-zA-Z]acute\;)|(\&[a-zA-Z]circ\;)|(\&[a-zA-Z]uml\;)|(\&[a-zA-Z]cedil\;)|(\&[a-zA-Z][a-zA-Z]lig\;)|(\&szlig\;)|(\&[a-zA-Z]tilde\;)|(\-)|( )|(\&amp\;\#39\;)|(\&\#039\;)|(\&amp\;\#34\;)|(\&\#034\;)|(\&quot\;)|(\.)|(\!)|([,]))*$/';
        return (isset($chaine) && strlen($chaine) >= $min && strlen($chaine) <= $max && preg_match($regNumber, $chaine));
    }
}