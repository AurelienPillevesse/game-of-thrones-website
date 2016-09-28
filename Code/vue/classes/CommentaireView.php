<?php

class CommentaireView{
    
    public static function getHtmlDevelopped($commentaire) {
        $htmlCode = "<br/>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $commentaire->getContent();
        $htmlCode .= "</p>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $commentaire->getIdAuthor();
        $htmlCode .= "</p><br/>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $commentaire->getIdArticle();
        $htmlCode .= "</p><br/>";
        $htmlCode .= '<p text-align="center">';
        $htmlCode .= $commentaire->getDatePublication();
        $htmlCode .= "</p><br/>";

        return $htmlCode;
        
    }
}

