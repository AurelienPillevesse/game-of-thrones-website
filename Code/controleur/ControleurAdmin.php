<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurAdmin
 *
 * @author Pierre
 */
class ControleurAdmin {

    function __construct($action) {
        try{
            switch ($action) {
                case "saisie":
                    $this->saisie();
                    break;
                case "putArticle":
                    $this->putArticle();
                    break;
                case "saisiePersonnage":
                    $this->saisiePersonnage();
                    break;
                case "putPersonnage":
                    $this->putPersonnage();
                    break;
                case "modifyPersonnage":
                    $this->modifyPersonnage();
                    break;
                case "editPersonnage":
                    $this->editPersonnage();
                    break;
                case "deletePersonnage":
                    $this->deletePersonnage();
                    break;
                case "get":
                    $this->get();
                    break;
                case "putComment":
                    $this->putComment();
                    break;
                case "modifyArticle":
                    $this->modifyArticle();
                    break;
                case "editArticle":
                    $this->editArticle();
                    break;
                case "deleteArticle":
                    $this->deleteArticle();
                    break;   
                case "deleteComment":
                    $this->deleteComment();
                    break;
                case "get-all":
                    $this->getAll();
                    break;
                case "get-all-personnage":
                    $this->getAllPersonnage();
                    break;
                case "ajouterImage":
                    $this->ajouterImage();
                    break;
                case "ajouterImagePersonnage":
                    $this->ajouterImagePersonnage();
                    break;
                case "putImage":
                    $this->putImage();
                    break;
                case "putImagePersonnage":
                    $this->putImagePersonnage();
                    break;
                case "deleteImage":
                    $this->deleteImage();
                    break;
                case "deleteImagePersonnage":
                    $this->deleteImagePersonnage();
                    break;
                case "deconnexion":
                    $this->deconnexion();
                    break;
                default:
                    require (Config::getVues()['defaultAdmin']);
                    break;
            }
        } catch (Exception $ex) {
            $modele = new Model(array('exception' => $ex->getMessage()));
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function saisie() {
        $model = ModelArticle::getModelDefaultArticle();
        require (Config::getVues()['saisieArticle']);
    }
    
    private function putArticle() {
        require (dirname(__FILE__)."/validationArticle.php");
        $modele = ModelArticle::getModelArticlePut($_SESSION['login'], $title, $content);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['saisieArticleTrue']);
        } else {
            require (Config::getVuesErreur()['saisieArticleFalse']);
        }
    }
    
    private function saisiePersonnage() {
        $model = ModelPersonnage::getModelDefaultPersonnage();
        require (Config::getVues()['saisiePersonnage']);
    }
    
    private function putPersonnage() {
        require (dirname(__FILE__).'/validationPersonnage.php');
        $modele = ModelPersonnage::getModelPersonnagePut($nom, $age, $description);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['saisiePersonnageTrue']);
        } else {
            require (Config::getVuesErreur()['saisiePersonnageFalse']);
        }
    }
    
    private function modifyPersonnage() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modele = ModelPersonnage::getModelPersonnage($id);
        if($modele->getError() === false){
            require (Config::getVues()['modifyPersonnage']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function editPersonnage() {
        require (dirname(__FILE__).'/validationPersonnage.php');
        $modele = ModelPersonnage::getModelPersonnagePost($idPersonnage, $nom, $age, $description);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['modifyPersonnageTrue']);
        }
        else{
            require (Config::getVuesErreur()['modifyFalse']);
        }
    }
    
    private function deletePersonnage() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modele = ModelPersonnage::deletePersonnage($id);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['deletePersonnageTrue']);
        }
        else{
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
            require (Config::getVues()['afficheArticleAdmin']);
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
    
    private function deleteComment() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modele = ModelCommentaire::deleteCommentaire($id);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['deleteCommentTrue']);
        }
        else{
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function modifyArticle() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modele = ModelArticle::getModelArticle($id);
        if($modele->getError() === false){
            require (Config::getVues()['modifyArticle']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function editArticle() {
        require (dirname(__FILE__)."/validationArticle.php");
        $modele = ModelArticle::getModelArticlePost($_POST['idArticle'], $title, $content);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['modifyArticleTrue']);
        }
        else{
            require (Config::getVuesErreur()['modifyFalse']);
        }
    }
    
    private function deleteArticle() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
        $modele = ModelArticle::deleteArticle($id);
        if($modele->getError() === false){
            require (Config::getVuesInfos()['deleteArticleTrue']);
        }
        else{
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function getAll() {
        $modele = ModelCollectionArticle::getModelArticleAll();           
        if($modele->getError() === false){
            require (Config::getVues()['afficheCollectionArticleAdmin']);
        }
        else{
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
            require (Config::getVues()['afficheCollectionPersonnageAdmin']);
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function ajouterImage() {
        $id = filter_var($_REQUEST['idArticlePersonnage'], FILTER_SANITIZE_STRING);
        $modele = ModelImage::getModelDefaultImage();
        require (Config::getVues()['saisieImage']);
    }
    
    private function ajouterImagePersonnage() {
        $id = filter_var($_REQUEST['idArticlePersonnage'], FILTER_SANITIZE_STRING);
        $modele = ModelImage::getModelDefaultImage();
        require (Config::getVues()['saisieImagePersonnage']);
    }
    
    private function putImage() {
        require (dirname(__FILE__).'/validationImage.php');
        if($type === 'image') {
            move_uploaded_file($_FILES['imagePath']['tmp_name'], dirname(dirname(__FILE__))."\\ressources\\".$img);
            $model = ModelImage::getModelImagePut($id, $img);
            if($model->getError() === false) {
                ModelArticle::updateImageArticle($id, 1);
                require (Config::getVuesInfos()['saisieImageArticleTrue']);
            } else {
                require (Config::getVuesErreur()['default']);
            }
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function putImagePersonnage() {
        require (dirname(__FILE__).'/validationImage.php');
        if($type === 'image') {
            move_uploaded_file($_FILES['imagePath']['tmp_name'], dirname(dirname(__FILE__))."\\ressources\\".$img);
            $model = ModelImage::getModelImagePut($id, $img);
            if($model->getError() === false) {
                ModelPersonnage::updateImagePersonnage($id, 1);
                require (Config::getVuesInfos()['saisieImagePersonnageTrue']);
            } else {
                require (Config::getVuesErreur()['default']);
            }
        } else {
            require (Config::getVuesErreur()['default']);
        }
    }
    
    private function deleteImage() {
         $id = filter_var($_REQUEST['idArticlePersonnage'], FILTER_SANITIZE_STRING);
         $model = ModelImage::getModelImageDelete($id);
         if($model->getError() === false) {
            ModelArticle::updateImageArticle($id, 0);
            require (Config::getVuesInfos()['deleteImageArticleTrue']);
         } else {
             require (Config::getVuesErreur()['default']);
         }
    }
    
        private function deleteImagePersonnage() {
         $id = filter_var($_REQUEST['idArticlePersonnage'], FILTER_SANITIZE_STRING);
         $model = ModelImage::getModelImageDelete($id);
         if($model->getError() === false) {
            ModelPersonnage::updateImagePersonnage($id, 0);
            require (Config::getVuesInfos()['deleteImagePersonnageTrue']);
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
