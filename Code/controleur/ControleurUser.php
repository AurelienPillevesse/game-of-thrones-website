<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurUser
 *
 * @author Aurélien
 */
class ControleurUser {
    function __construct($action) {
        
        try {
            switch ($action) {
                case "get":
                    $this->get();
                    break;
                case "putComment":
                    $this->putComment();
                    break;
                case "get-all":
                    $this->getAll();
                    break;
                case "get-all-personnage":
                    $this->getAllPersonnage();
                    break;
                case "deconnexion":
                    $this->deconnexion();
                    break;
                default:
                    break;
            }
        } catch (Exception $ex) {
            $model = new Model(array('exception' => $exc->getMessage()));
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function get() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modeleArticle = ModelArticle::getModelArticle($id);
        if($modeleArticle->getData()->getNbImage() == 1) {
            $modeleImage = ModelImage::getModelImage($id);
            if($modeleImage->getError() === true) {
                require (Config::getVuesErreur()['default']);
            }
        }
        $modeleComment = ModelCollectionCommentaire::getModelCommentaireAll($id);
        $value = $id;
        if($modeleComment->getError() === false){
            require (Config::getVues()['afficheArticleUser']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function putComment() {
        require (dirname(__FILE__).'/validationCommentaire.php');
        $modele = ModelCommentaire::getModelCommentairePut($_SESSION['login'], $idArticle, $content);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['saisieCommentTrue']);
        } else {
            require (Config::getVuesErreur()['saisieCommentFalse']);
        }
    }
    
    private function getAll() {
        $modele = ModelCollectionArticle::getModelArticleAll();
        if($modele->getError() === false){
            require (Config::getVues()['afficheCollectionArticleUser']);
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
            require (Config::getVues()['afficheCollectionPersonnageUser']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function deconnexion() {
        $model = Deconnexion::finishSession($dataError);
        if($model->getError() === false) {
            require (Config::getVuesInfos()['deconnexionTrue']);
        } else {
            require (Config::getVuesErreur()['deconnexionFalse']);
        }
    }
}
