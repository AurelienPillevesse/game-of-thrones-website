<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageGateway
 *
 * @author Aurélien
 */
class ImageGateway {
    
    public static function getImageByIdArticle(&$dataError, $id) {
        if(isset($id)) {
            $query = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Image WHERE idArticlePersonnage = ?', array($id));
            if(isset($query) && is_array($query)) {
                if(count($query) == 1) {
                    $row = $query[0];
                    $image = ImageFabrique::getImage($dataError, $row['id'], $row['idArticlePersonnage'], $row['path']);
                } else {
                    $dataError['persistance'] = "Image introuvable";
                }
            } else {
                $dataError['persistance'] = "Impossible d'acceder aux données";
            }
        }
        return $image;
    }
    
    public static function putImage(&$dataError, $idArticlePersonnage, $path) {
        $image = ImageFabrique::getImage($dataError, "0000000000", $idArticlePersonnage, $path);
        
        if(empty($dataError)) {
            $queryResult = false;
            $count = 0;
            while($queryResult === false && $count <= 3) {
                $image->setId(Config::generateRandomId());
                $count++;
                $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Image(id, idArticlePersonnage, path) VALUES (?, ?, ?)',
                    array($image->getId(),
                        $image->getIdArticlePersonnage(),
                        $image->getPath()
                        ));
            }
            if($queryResult === false) {
                $dataError['persistance'] = "Probleme execution de la requete";
            }
        }
        return $image;
    }
    
    public static function deleteImage(&$dataError, $idArticlePersonnage) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery("DELETE FROM Image WHERE idArticlePersonnage=?",
                array($idArticlePersonnage
                ));
        
        if($queryResults === false) {
            $dataError['persistance'] = "Probleme d'acces aux donnees";
        }
    }
    
}
