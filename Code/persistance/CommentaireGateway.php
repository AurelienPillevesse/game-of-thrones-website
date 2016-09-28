<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class CommentaireGateway {
    
    public static function getAllCommentaireById(&$dataError, $id) {
        $collectionCommentaire = array();
        
        if(isset($id)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Comment WHERE idArticle = ? ORDER BY dateComment DESC', array($id));

            if($queryResults !== false) {
                $cmpt = 0;
                $array_id = array_column($queryResults, 'id');
                foreach ($queryResults as $row) {
                    if($cmpt < 3) {
                        $loginAuthor = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT login FROM User WHERE id=?', array($row['idAuthor']));
                        $loginAuthor = array_column($loginAuthor, 'login');
                        $commentaire = CommentaireFabrique::getCommentaire($dataError, $row['id'], $row['content'], $row['idArticle'], $row['idAuthor'], $loginAuthor[0], $row['dateComment']);
                        $collectionCommentaire[] = $commentaire;
                        $cmpt++;
                    } else {
                        $statement = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Comment WHERE id = ?', array($array_id[$cmpt]));
                        // gerer l'erreur de la requete
                        $cmpt++;
                    }
                }
            } else {
                $dataError['persistance'] = "Probleme d'acces aux donnees";
            }
        }
        
        return $collectionCommentaire;
    }
    
    public static function putCommentaire(&$dataError, $login, $content, $idArticle) {
        $idAuthor = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT id FROM User WHERE login = ?', array($login));
        $idAuthor = array_column($idAuthor, 'id');
        $commentaire = CommentaireFabrique::getCommentaire($dataError, "0000000000", $content, $idArticle, $idAuthor[0]);

        if(empty($dataError)) {
            $queryResults = false;
            $count = 0;

            while($queryResults === false && $count <= 3) {
                $commentaire->setId(Config::generateRandomId());
                $count++;
                
                $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Comment(id, content, idArticle, idAuthor, dateComment) VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)',
                    array($commentaire->getId(),
                        $commentaire->getContent(),
                        $commentaire->getIdArticle(),
                        $commentaire->getIdAuthor()
                        ));
            }
            if($queryResults === false) {
                $dataError["persistance"] = "Probleme d'execution de la requete";
            }
        }
        
        return $commentaire;
    }

    public static function deleteCommentaire(&$dataError, $id) {
        if(empty($dataError)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Comment WHERE id=?', array($id));
            if($queryResults === false) {
                $dataError['persistance'] = "Probleme execution de la requete";
            }
        }
        
        return null;
    }

}
