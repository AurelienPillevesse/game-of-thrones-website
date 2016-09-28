<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelCollectionImage
 *
 * @author Aurélien
 */
class ModelCollectionImage extends Model{
    
    private $collectionImage;
    
    public function getData() {
        return $this->collectionImage;
    }
    
    public function __construct() {
        $this->collectionImage = array();
        $this->dataError = array();
    }
    
    public static function getModelImageAllById($collectionIdArticle) {
        $model = new self(array());
        for($i = 0 ; $i < count($collectionIdArticle) ; $i++) {
            $model->collectionImage[$i] = ImageGateway::getImageByIdArticle($dataError, $collectionIdArticle[$i]);
        }
        return $model;
    }
    
}
