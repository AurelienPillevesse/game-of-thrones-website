<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelArticle extends Model{
    
    private $article;
    
    private $title;
    
    public function getData() {
        return $this->article;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public static function getModelDefaultArticle() {
        $model = new self(array());
        $model->article = Article::getDefaultArticle();
        $model->title = "Saisie d'un article";
        return $model;
    }
    
    public static function getModelArticle($id) {
        $model = new self(array());
        $model->article = ArticleGateway::getArticleById($model->dataError, $id);
        $model->title = "Affichage d'un article";
        return $model;
    }
    
    public static function getModelArticlePost($id, $title, $content) {
        $model = new self(array());
        $model->article = ArticleGateway::postArticle($model->dataError, $id, $title, $content);
        $model->title = "L'article a été mis à jour";
        return $model;
    }
    
    public static function getModelArticlePut($login, $title, $content) {
        $model = new self(array());
        $model->article = ArticleGateway::putArticle($model->dataError, $login, $title, $content, 0);
        $model->title = "L'article a été ajouté";
        return $model;
    }
    
    public static function deleteArticle($id) {
        $model = new self(array());
        $model->article = ArticleGateway::deleteArticle($model->dataError, $id);
        $model->title = "Article supprimé";
        return $model;
    }
    
    public static function updateImageArticle($id, $value) {
        $model = new self(array());
        ArticleGateway::updateImageArticle($model->dataError, $id, $value);
    } 
}

