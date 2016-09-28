<?php

class Config{
    
    public static function getVues() {
        global $rootDirectory;
        
        $vueDirectory = $rootDirectory."vue/";
        return array(
            "default" => $vueDirectory."vueAccueil.php",
            "defaultAdmin" => $vueDirectory."vueAccueil.php",
            "inscription" => $vueDirectory."vueInscription.php",
            "authentification" => $vueDirectory."vueAuthentification.php",
            "saisiePersonnage" => $vueDirectory."vueSaisiePersonnage.php",
            "modifyPersonnage" => $vueDirectory."vueModifyPersonnage.php",
            "afficheCollectionPersonnage" => $vueDirectory."vueCollectionPersonnage.php",
            "afficheCollectionPersonnageUser" => $vueDirectory."vueCollectionPersonnageUser.php",
            "afficheCollectionPersonnageAdmin" => $vueDirectory."vueCollectionPersonnageAdmin.php",
            "saisieArticle" => $vueDirectory."vueSaisieArticle.php",
            "saisieImage" => $vueDirectory."vueSaisieImage.php",
            "saisieImagePersonnage" => $vueDirectory."vueSaisieImagePersonnage.php",
            "modifyArticle" => $vueDirectory."vueModifyArticle.php",
            "afficheArticle" => $vueDirectory."vueAfficheCommentaireArticle.php",
            "afficheArticleUser" => $vueDirectory."vueAfficheCommentaireArticleUser.php",
            "afficheArticleAdmin" => $vueDirectory."vueAfficheCommentaireArticleAdmin.php",
            "afficheArticleDetail" => $vueDirectory."vueAfficheArticleDetail.php",
            "afficheArticleDetailUser" => $vueDirectory."vueAfficheArticleDetailUser.php",
            "afficheArticleDetailAdmin" => $vueDirectory."vueAfficheArticleDetailAdmin.php",
            "afficheCollectionArticle" => $vueDirectory."vueCollectionArticle.php",
            "afficheCollectionArticleUser" => $vueDirectory."vueCollectionArticleUser.php",
            "afficheCollectionArticleAdmin" => $vueDirectory."vueCollectionArticleAdmin.php"
            );
    }
    
    public static function getVuesInfos() {
        global $rootDirectory;
        
        $vueDirectory = $rootDirectory."vue/infos/";
        return array(
            "inscriptionTrue" => $vueDirectory."vueInscriptionTrue.php",
            "authentificationTrue" => $vueDirectory."vueAuthentificationTrue.php",
            "deconnexionTrue" => $vueDirectory."vueDeconnexionTrue.php",
            "saisiePersonnageTrue" => $vueDirectory."vueSaisiePersonnageTrue.php",
            "modifyPersonnageTrue" => $vueDirectory."vueModifyPersonnageTrue.php",
            "saisieArticleTrue" => $vueDirectory."vueSaisieArticleTrue.php",
            "saisieCommentTrue" => $vueDirectory."vueSaisieCommentTrue.php",
            "saisieImageArticleTrue" => $vueDirectory."vueSaisieImageArticleTrue.php",
            "saisieImagePersonnageTrue" => $vueDirectory."vueSaisieImagePersonnageTrue.php",
            "modifyArticleTrue" => $vueDirectory."vueModifyArticleTrue.php",
            "deleteArticleTrue" => $vueDirectory."vueDeleteArticleTrue.php",
            "deleteCommentTrue" => $vueDirectory."vueDeleteCommentTrue.php",
            "deletePersonnageTrue" => $vueDirectory."vueDeletePersonnageTrue.php",
            "deleteImageArticleTrue" => $vueDirectory."vueDeleteImageArticleTrue.php",
            "deleteImagePersonnageTrue" => $vueDirectory."vueDeleteImagePersonnageTrue.php"
        );
    }
    
    public static function getVuesErreur() {
        global $rootDirectory;
        
        $vueDirectory = $rootDirectory."vue/errors/";
        return array(
            "default" => $vueDirectory."vueErreurDefault.php",
            "saisie" => $vueDirectory."vueAccessDenied.php",
            "authentificationFalse" => $vueDirectory."vueAuthentificationError.php",
            "deconnexionFalse" => $vueDirectory."vueDeconnexionError.php",
            "saisieArticleFalse" => $vueDirectory."vueSaisieArticleError.php",
            "saisieCommentFalse" => $vueDirectory."vueSaisieCommentError.php",
            "saisiePersonnageFalse" => $vueDirectory."vueSaisiePersonnageError.php",
            "modifyFalse" => $vueDirectory."vueModifyError.php",
            "notAccess" => $vueDirectory."vueNotAccess.php"
        );
    }
    
    public static function getStyleSheetsURL() {
        $cssDirectoryURL = "http://".$_SERVER['HTTP_HOST']."/BlogPHPyolo/css/";
        return array(
            "default" => $cssDirectoryURL."css/bootstrap.min.css",
            "custom" => $cssDirectoryURL."css/css/modern-business.css"
            );
    }
    
    public static function generateRandomId() {
        $crypto_strong = false;
        $octets = openssl_random_pseudo_bytes(5, $crypto_strong);
        return bin2hex($octets);
    }
}

