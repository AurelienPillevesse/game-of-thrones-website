<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurPublic
 *
 * @author Pierre
 */
class ControleurPublic {
    function __construct($action) {
        
        try{
            switch ($action) {
                case "inscription":
                    $this->inscription();
                    break;
                case "putUser":
                    $this->putUser();
                    break;
                case "auth":
                    $this->auth();
                    break;
                case "validateAuth":
                    $this->validateAuth();
                    break;
                case "get":
                    $this->get();
                    break;
                case "get-all":
                    $this->getAll();
                    break;                
                case "get-all-personnage":
                    $this->getAllPersonnage();
                    break;
                default:
                    require (Config::getVues()['default']);
                    break;
            }
        }
         catch (Exception $ex) {
            $modele = new Model(array('exception' => $ex->getMessage()));
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function inscription() {
        $model = ModelUser::getModelDefaultUser();
        require (Config::getVues()['inscription']);
    } 
        
    private function putUser() {
        require (dirname(__FILE__).'/validationUser.php');
        if(empty($dataError)) {
            $model = ModelUser::getModelUserPut($login, $password);
            if($model->getError() === false) {
                require (Config::getVuesInfos()['inscriptionTrue']);
            } else if(!empty($model->getError()['login-notavailable'])) {
                $text = "Sorry! This login is not available";
                require (Config::getVues()['inscription']);
            } else {
                if(!empty($model->getError()['persistance'])) {
                    require (Config::getVuesErreur()['default']);
                }
            }
        } else {
            if(!empty($dataError['login'])) {
                $messageLogin = $dataError['login'];
            }
            if(!empty($dataError['password'])) {
                $messagePassword = $dataError['password'];
            }
            require (Config::getVues()['inscription']);
        }
    }
    
    private function auth() {
        $model = new Model(array());
        require (Config::getVues()['authentification']);
    } 
    
    private function validateAuth() {
        require (dirname(__FILE__)."/validationUser.php");
        $model = Authentification::checkAndInitiateSession($dataError, $login, $password);
        if($model->getError() === false){
            require (Config::getVuesInfos()['authentificationTrue']);
        }
        else{
            require (Config::getVuesErreur()['authentificationFalse']);
        }
    }
    
    private function get() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modeleArticle = ModelArticle::getModelArticle($id);
        if($modeleArticle->getData()->getNbImage() == 1) {
            $modeleImage = ModelImage::getModelImage($id);
            if($modeleImage->getError() === true) {
                require (Config::getVuesErreur()['accueil']);
            }
        }
        $modeleComment = ModelCollectionCommentaire::getModelCommentaireAll($id);
        $value = $id;
        if($modeleComment->getError() === false){
            require (Config::getVues()['afficheArticle']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function getAll() {
        $modele = ModelCollectionArticle::getModelArticleAll();
        if($modele->getError() === false){
            require (Config::getVues()['afficheCollectionArticle']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function getAllPersonnage() {
        $modele = ModelCollectionPersonnage::getModelPersonnageAll();
        for($i = 0 ; $i < count($modele->getData()) ; $i++) {
            if($modele->getData()[$i]->getNbImage() == 1) {
                $collectionImagePersonnage[$i] = ModelImage::getModelImage($modele->getData()[$i]->getId());
            }
        }
        if($modele->getError() === false) {
            require (Config::getVues()['afficheCollectionPersonnage']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
}
