<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImagePropertiesTrait
 *
 * @author Aurélien
 */
trait ImagePropertiesTrait {
    
    public function getId() {
        return strval($this->id);
    }
    
    public function getIdArticlePersonnage() {
        return strval($this->idArticlePersonnage);
    }
    public function getPath() {
        return html_entity_decode($this->path, ENT_QUOTES, "UTF-8");
    }
    
    public function setId ($id) {
        $this->id = $id;
    }
    
    public function setIdArticlePersonnage($idArticlePersonnage) {
        $pattern = '/^[0-9a-f]{10}$/';
        if(!isset($idArticlePersonnage) || !preg_match($pattern, $idArticlePersonnage)) {
            throw new Exception("Erreur identifiant d'article ou de personnage incorrect");
        }
        $this->idArticlePersonnage = $idArticlePersonnage;
    }
    
    public function setPath($path) {
        $escaped = htmlentities($path, ENT_QUOTES, "UTF-8");
        if(!$this->isValidRegexWithNumbers($escaped, 1, 50)) {
            throw new Exception("Erreur le path doit contenir entre 1 et 50 caractères alphanumériques.");
        }
        $this->path = empty($escaped) ? "" : $escaped;
    }
    
        
    public function isValidRegexWithNumbers($chaine, $min, $max) {
        $regNumber = '/^([a-zA-Z0-9]|(\&[a-zA-Z]grave\;)|(\&[a-zA-Z]acute\;)|(\&[a-zA-Z]circ\;)|(\&[a-zA-Z]uml\;)|(\&[a-zA-Z]cedil\;)|(\&[a-zA-Z][a-zA-Z]lig\;)|(\&szlig\;)|(\&[a-zA-Z]tilde\;)|(\-)|( )|(\&amp\;\#39\;)|(\&\#039\;)|(\&amp\;\#34\;)|(\&\#034\;)|(\&quot\;)|(\.)|(\!)|([,_]))*$/';
        return (isset($chaine) && strlen($chaine) >= $min && strlen($chaine) <= $max && preg_match($regNumber, $chaine));
    }
    
}
