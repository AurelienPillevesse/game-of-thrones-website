<?php

require (dirname(__FILE__).'/Commentaire.php');

class CommentaireFabrique {
    
    public static function getCommentaire(&$dataError, $id, $content, $idArticle, $idAuthor = null, $loginAuthor = null, $datePublication = null) {
        $commentaire = Commentaire::getDefaultCommentaire();
        $dataError = array();
        
        try {
            $commentaire->setId($id);
        } catch (Exception $ex) {
            $dataError['id'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $commentaire->setContent($content);
        } catch (Exception $ex) {
            $dataError['content'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $commentaire->setIdAuthor($idAuthor);
        } catch (Exception $ex) {
            $dataError['idAuthor'] = $ex->getTraceAsString()."<br/>\n";
        }
        
        try {
            $commentaire->setIdArticle($idArticle);
        } catch (Exception $exc) {
            $dataError['idArticle'] = $exc->getMessage()."<br/>\n";
        }
        
        try {
            $commentaire->setDatePublication($datePublication);
        } catch (Exception $ex) {
            $dataError['datePublication'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $commentaire->setLoginAuthor($loginAuthor);
        } catch (Exception $ex) {
            $dataError['loginAuthor'] = $ex->getMessage()."<br/>\n";
        }
        
        return $commentaire;
    }
    
}