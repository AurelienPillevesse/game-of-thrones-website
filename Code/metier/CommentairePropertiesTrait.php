<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

trait CommentairePropertiesTrait {
    
    
    public function getId() {
        return $this->id;
    }
    public function getContent() {
        return html_entity_decode($this->content, ENT_QUOTES, "UTF-8");
    }
    public function getIdArticle() {
        return html_entity_decode($this->idArticle, ENT_QUOTES, "UTF-8");
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
    
    public function setId ($id) {
        $pattern = '/^[0-9a-f]{10}$/';
        if(!isset($id) || !preg_match($pattern, $id)) {
            throw new Exception("Erreur identifiant incorrect");
        }
        $this->id = $id;
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
    
    public function setIdArticle ($idArticle) {
        $pattern = '/^[0-9a-f]{10}$/';
        if(!isset($idArticle) || !preg_match($pattern, $idArticle)) {
            throw new Exception("Erreur identifiant incorrect");
        }
        $this->idArticle = $idArticle;
    }
    
    public function setDatePublication($datePublication) {
        $this->datePublication = $datePublication;
    }
    
    public function setLoginAuthor($loginAuthor) {
        $this->loginAuthor = $loginAuthor;
    }
      
    public function isValidRegexWithNumbers($chaine, $min, $max) {
        $regNumber = '/^([a-zA-Z0-9]|(\&[a-zA-Z]grave\;)|(\&[a-zA-Z]acute\;)|(\&[a-zA-Z]circ\;)|(\&[a-zA-Z]uml\;)|(\&[a-zA-Z]cedil\;)|(\&[a-zA-Z][a-zA-Z]lig\;)|(\&szlig\;)|(\&[a-zA-Z]tilde\;)|(\-)|( )|(\&amp\;\#39\;)|(\&\#039\;)|(\&amp\;\#34\;)|(\&\#034\;)|(\&quot\;)|(\.)|(\!)|([,]))*$/';
        return (isset($chaine) && strlen($chaine) >= $min && strlen($chaine) <= $max && preg_match($regNumber, $chaine));
    }
}
