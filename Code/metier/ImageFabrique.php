<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageFabrique
 *
 * @author Aurélien
 */

require (dirname(__FILE__).'/Image.php');

class ImageFabrique {
    
    public static function getImage(&$dataError, $id, $idArticlePersonnage, $path) {
        $image = Image::getDefaultImage();
        $dataError = array();

        try {
            $image->setId($id);
        } catch (Exception $ex) {
            $dataError['id'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $image->setIdArticlePersonnage($idArticlePersonnage);
        } catch (Exception $ex) {
            $dataError['idArticlePersonnage'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $image->setPath($path);
        } catch (Exception $ex) {
            $dataError['path'] = $ex->getMessage()."<br/>\n";
        }
        
        return $image;
    }
    
}
