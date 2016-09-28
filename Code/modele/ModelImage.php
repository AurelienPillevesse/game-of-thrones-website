<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelImage
 *
 * @author Aurélien
 */
class ModelImage extends Model{
    
    private $image;
    private $title;
    
    public function getData() {
        return $this->image;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public static function getModelDefaultImage() {
        $model = new self(array());
        $model->image = Image::getDefaultImage();
        $model->title = "Saisie d'un personnage";
        return $model;
    }
    
    public static function getModelImage($id) {
        $model = new self(array());
        $model->image = ImageGateway::getImageByIdArticle($model->dataError, $id);
        $model->title = "Affichage d'une image";
        return $model;
    }
    
    public static function getModelImagePut($idArticlePersonnage, $path) {
        $model = new self(array());
        $model->image = ImageGateway::putImage($model->dataError, $idArticlePersonnage, $path);
        $model->title = "L'image a été ajouté";
        return $model;
    }
    
    public static function getModelImageDelete($idArticlePersonnage) {
        $model = new self(array());
        $model->image = ImageGateway::deleteImage($model->dataError, $idArticlePersonnage);
        $model->title = "Image supprimé";
        return $model;
    }
}
