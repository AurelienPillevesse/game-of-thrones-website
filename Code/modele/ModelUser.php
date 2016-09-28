<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelUser
 *
 * @author Pierre
 */
class ModelUser extends Model{
    
    private $user;
    private $title;
    private $login;
    //private $password;
    private $role;
    
    public function getRole() {
        return $this->role;
    }
    
    public static function getModelDefaultUser() {
        $model = new self(array());
        $model->user = User::getDefaultUser();
        $model->title = "Saisie d'un utilisateur";
        return $model;
    }
    
    public static function getModelUserPut($login, $password) {
        $model = new self(array());
        $model->user = UserGateway::putUser($model->dataError, $login, $password);
        $model->title = "L'utilisateur a ete insere";
        return $model;
    }
    
    public static function getModelUser($login, $hashedPassword) {
        $model = new self(array());
        $model->role = UserGateway::getRoleByPassword($model->dataError, $login, $hashedPassword);
        if($model->role !== false){
            $model->login = $login;
        } else {
            $model->dataError['login'] = "Login ou mot de passe incorrect";
        }
        
        return $model;
    }
    
    public function fillSessionData() {
        $_SESSION['login'] = $this->login;
        $_SESSION['role'] = $this->role;
        $_SESSION['ipAdress'] = $_SERVER['REMOTE_ADDR'];
    }
    
    public static function getModelUserFromSession() {
        $model = new self(array());
        if(!isset($_SESSION['login']) || !isset($_SESSION['role']) || !isset($_SESSION['ipAdress']) || ($_SESSION['ipAdress'] != $_SERVER['REMOTE_ADDR'])){
            $model->dataError['session'] = "Impossible de retrouver la session de l'utilisateur";
        }
        else{
            $model->role = $_SESSION['role'];
            $model->login = $_SESSION['login'];
        }
        
        return $model;
    }
}
