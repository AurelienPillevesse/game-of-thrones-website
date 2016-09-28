<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

trait ArticlePropertiesTrait {
    
    
    public function getId() {
        return strval($this->id);
    }
    
    public function getTitle() {
        return html_entity_decode($this->title, ENT_QUOTES, "UTF-8");
    }
    public function getContent() {
        return html_entity_decode($this->content, ENT_QUOTES, "UTF-8");
    }
    
    public function getIdAuthor() {
        return $this->idAuthor;
    }
    public function getDatePublication() {
        return $this->datePublication;
    }
    public function getLoginAuthor() {
        return $this->loginAuthor;
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
    
    public function setTitle($title) {
        $escaped = htmlentities($title, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 150)) {
            throw new Exception("Erreur le titre doit contenir entre 1 et 150 caractères alphanumériques.");
        }
        $this->title = empty($escaped) ? "" : $escaped;
    }
    
    public function setContent($content) {
        $escaped = htmlentities($content, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 1000)) {
            throw new Exception("Erreur le contenu doit contenir entre 1 et 1000 caractères alphanumériques.");
        }
        $this->content = empty($escaped) ? "" : $escaped;
    }
    
    public function setIdAuthor ($idAuthor) {
        $this->idAuthor = $idAuthor;
    }
    
    public function setDatePublication($datePublication) {
        $this->datePublication = $datePublication;
    }
    
    public function setLoginAuthor($loginAuthor) {
        $this->loginAuthor = $loginAuthor;
    }  
    
    public function setNbImage($nbImage) {
        $this->nbImage = $nbImage;
    }
    
    public function isValidRegexWithNumbers($chaine, $min, $max) {
        $regNumber = '/^([a-zA-Z0-9]|(\&[a-zA-Z]grave\;)|(\&[a-zA-Z]acute\;)|(\&[a-zA-Z]circ\;)|(\&[a-zA-Z]uml\;)|(\&[a-zA-Z]cedil\;)|(\&[a-zA-Z][a-zA-Z]lig\;)|(\&szlig\;)|(\&[a-zA-Z]tilde\;)|(\-)|( )|(\&amp\;\#39\;)|(\&\#039\;)|(\&amp\;\#34\;)|(\&\#034\;)|(\&quot\;)|(\.)|(\!)|([,]))*$/';
        return (isset($chaine) && strlen($chaine) >= $min && strlen($chaine) <= $max && preg_match($regNumber, $chaine));
    }
}