<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelCommentaire extends Model{
    
    private $commentaire;
    
    private $title;
    
    public function getData() {
        return $this->commentaire;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public static function getModelDefaultCommentaire() {
        $model = new self(array());
        $model->commentaire = Commentaire::getDefaultCommentaire();
        $model->title = "Saisie d'un commentaire";
        return $model;
    }
    
    public static function getModelCommentaire($id) {
        $model = new self(array());
        $model->commentaire = CommentaireGateway::getAllCommentaireById($model->dataError, $id);
        $model->title = "Affichage des commentaires d'un article";
        return $model;
    }
    
    public static function getModelCommentairePost($id, $title, $content, $idAuthor) {
        $model = new self(array());
        $commentaire = CommentaireFabrique::getCommentaire($model->dataError, $id, $title, $content, $idAuthor);
        $model->commentaire = CommentaireGateway::postAdresse($model->dataError, $commentaire);
        $model->title = "Le commentaire a été mis à jour";
        return $model;
    }
    
    public static function getModelCommentairePut($login, $idArticle, $content) {
        $model = new self(array());
        $model->commentaire = CommentaireGateway::putCommentaire($model->dataError, $login, $content, $idArticle);
        $model->title = "Le commentaire a été ajouté";
        return $model;
    }
    
    public static function deleteCommentaire($id) {
        $model = new self(array());
        $model->commentaire = CommentaireGateway::deleteCommentaire($model->dataError, $id);
        $model->title = "Commentaire supprimé";
        return $model;
    }
    
}


