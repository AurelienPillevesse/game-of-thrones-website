<?php

class ModelCollectionArticle extends Model{
    
    private $collectionArticle;
    
    public function getData() {
        return $this->collectionArticle;
    }
    
    //private
    public function __construct() {
        $this->collectionArticle = array();
        $this->dataError = array();
    }
    
    public static function getModelArticleAll() {
        $model = new self(array());
        $model->collectionArticle = ArticleGateway::getArticleAll($model->dataError);
        return $model;
    }
}

