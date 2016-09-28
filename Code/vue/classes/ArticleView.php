<?php

class ArticleView{
    
    public static function getHtmlDevelopped($article) {
        $htmlCode = "<br/>";
        $htmlCode .= "<strong>";
        $htmlCode .= $article->getTitle();
        $htmlCode .= "</strong><br/>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $article->getContent();
        $htmlCode .= "</p>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $article->getIdAuthor();
        $htmlCode .= "</p><br/>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $article->getDatePublication();
        $htmlCode .= "</p><br/>";

        return $htmlCode;
        
    }
}

