<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelPersonnage
 *
 * @author Aurélien
 */
class ModelPersonnage extends Model{
    
    private $personnage;
    private $title;
    
    public function getData() {
        return $this->personnage;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public static function getModelDefaultPersonnage() {
        $model = new self(array());
        $model->personnage = Personnage::getDefaultPersonnage();
        $model->title = "Saisie d'un personnage";
        return $model;
    }
    
    public static function getModelPersonnage($id) {
        $model = new self(array());
        $model->personnage = PersonnageGateway::getPersonnageById($model->dataError, $id);
        $model->title = "Affichage d'un personnage";
        return $model;
    }
    
    public static function getModelPersonnagePut($nom, $age, $description) {
        $model = new self(array());
        $model->personnage = PersonnageGateway::putPersonnage($model->dataError, $nom, $age, $description, 0);
        $model->title = "Le personnage a été ajouté";
        return $model;
    }
    
    public static function getModelPersonnagePost($idPersonnage, $nom, $age, $description) {
        $model = new self(array());
        $model->personnage = PersonnageGateway::postPersonnage($model->dataError, $idPersonnage, $nom, $age, $description);
        $model->title = "Le personne a été mis à jour";
        return $model;
    }
    
    public static function deletePersonnage($id) {
        $model = new self(array());
        $model->personnage = PersonnageGateway::deletePersonnage($model->dataError, $id);
        $model->title = "Personnage supprimé";
        return $model;
    }
    
    public static function updateImagePersonnage($id, $value) {
        $model = new self(array());
        PersonnageGateway::updateImagePersonnage($model->dataError, $id, $value);
        return $model;
    } 
}
