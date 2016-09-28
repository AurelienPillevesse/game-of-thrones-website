<?php

require (dirname(__FILE__).'/Article.php');

class ArticleFabrique {
    
    public static function getArticle(&$dataError, $id, $title, $content, $idAuthor = null, $loginAuthor = null, $datePublication = null, $nbImage = null) {
        $article = Article::getDefaultArticle();
        $dataError = array();
        
        try {
            $article->setId($id);
        } catch (Exception $ex) {
            $dataError['id'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $article->setTitle($title);
        } catch (Exception $ex) {
            $dataError['title'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $article->setContent($content);
        } catch (Exception $ex) {
            $dataError['content'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $article->setIdAuthor($idAuthor);
        } catch (Exception $ex) {
            $dataError['idAuthor'] = $ex->getTraceAsString()."<br/>\n";
        }
        
        try {
            $article->setDatePublication($datePublication);
        } catch (Exception $ex) {
            $dataError['datePublication'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $article->setLoginAuthor($loginAuthor);
        } catch (Exception $ex) {
            $dataError['loginAuthor'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $article->setNbImage($nbImage);
        } catch (Exception $ex) {
            $dataError['nbImage'] = $ex->getMessage()."<br/>\n";
        }
        
        return $article;
    }
    
}