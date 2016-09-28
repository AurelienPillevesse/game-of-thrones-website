<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ArticleGateway {
    
    public static function getArticleById(&$dataError, $id) {
        if(isset($id)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Article WHERE id = ?', array($id));
            if(isset($queryResults) && is_array($queryResults)) {
                if(count($queryResults) == 1) {
                    $row = $queryResults[0];
                    $loginAuthor = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT login FROM User WHERE id=?', array($row['idAuthor']));
                    $loginAuthor = array_column($loginAuthor, 'login');
                    $article = ArticleFabrique::getArticle($dataError, $row['id'], $row['title'], $row['content'], $row['idAuthor'], $loginAuthor[0], $row['datePublication'], $row['nbImage']);
                } else {
                    $dataError['persistance'] = "Article introuvable";
                }
            } else {
                $dataError['persistance'] = "Impossible d'acceder aux données";
            }
        }
        return $article;
    }
    
    public static function getArticleAll(&$dataError) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Article ORDER BY datePublication DESC', array());
        $collectionArticle = array();
        
        if($queryResults !== false) {
            foreach ($queryResults as $row) {
                $loginAuthor = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT login FROM User WHERE id=?', array($row['idAuthor']));
                $loginAuthor = array_column($loginAuthor, 'login');
                $article = ArticleFabrique::getArticle($dataError, $row['id'], $row['title'], $row['content'], $row['idAuthor'], $loginAuthor[0], $row['datePublication']);
                $collectionArticle[] = $article;
            }
        } else {
            $dataError['persistance'] = "Problème d'accès aux données";
        }
        return $collectionArticle;
    }
    
    public static function putArticle(&$dataError, $login, $title, $content, $nombreImage) {
        $idAuthor = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT id FROM User WHERE login = ?', array($login));
        $idAuthor = array_column($idAuthor, 'id');
        
        $article = ArticleFabrique::getArticle($dataError, "0000000000", $title, $content, $idAuthor[0]);
        
        if(empty($dataError)) {
            $queryResults = false;
            $count = 0;
            
            while($queryResults === false && $count <= 3) {
                $article->setId(Config::generateRandomId());
                $count++;
                $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Article(id, title, content, idAuthor, datePublication, nbImage) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP, ?)',
                    array($article->getId(),
                        $article->getTitle(),
                        $article->getContent(),
                        $article->getIdAuthor(),
                        $nombreImage
                        ));
            }
            if($queryResults === false) {
                $dataError["persistance"] = "Probleme d'execution de la requete";
            }
        }
        
        return $article;
    }

    public static function deleteArticle(&$dataError, $id) {
        $article = self::getArticleById($dataError, $id);
        
        if(empty($dataError)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Article WHERE id=?', array($id));
            $query = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Comment WHERE idArticle=?', array($id));
            if($queryResults === false || $query === false) {
                $dataError['persistance'] = "Probleme execution de la requete";
            }
        }
        
        return $article;
    }
    
    public static function postArticle(&$dataError, $id, $title, $content) {
        $article = ArticleFabrique::getArticle($dataError, $id, $title, $content);
        
        if(empty($dataError)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery("UPDATE Article SET title=?, content=? WHERE id=?",
                    array($article->getTitle(),
                        $article->getContent(),
                        $article->getId()
                    ));
            if($queryResults === false) {
                $dataError['persistance'] = "Probleme d'acces aux donnees";
            }
        }
        return $article;
    }
    
    public static function updateImageArticle(&$dataError, $id, $value) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery("UPDATE Article SET nbImage=? WHERE id=?",
                array($value,
                    $id
                ));
        if($queryResults === false) {
            $dataError['persistance'] = "Probleme d'acces aux donnees";
        }
    }
}
