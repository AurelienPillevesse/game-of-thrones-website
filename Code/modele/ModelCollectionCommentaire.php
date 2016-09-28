<?php

class ModelCollectionCommentaire extends Model{
    
    private $collectionCommentaire;
    
    public function getData() {
        return $this->collectionCommentaire;
    }
    
    //private
    public function __construct() {
        $this->collectionCommentaire = array();
        $this->dataError = array();
    }
    
    public static function getModelCommentaireAll($id) {
        $model = new self(array());
        $model->collectionCommentaire = CommentaireGateway::getAllCommentaireById($model->dataError, $id);
        return $model;
    }
}

