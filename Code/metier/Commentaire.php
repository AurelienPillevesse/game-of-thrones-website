<?php

require (dirname(__FILE__).'/regex.php');
require (dirname(__FILE__).'/CommentairePropertiesTrait.php');

/**
 * Description of Commentaire
 *
 * @author Aurélien
 */
class Commentaire {
    
    private $id;
    private $content;
    private $idAuthor;
    private $idArticle;
    private $loginAuthor;
    private $datePublication;
    
    use CommentairePropertiesTrait;
    
    private static function generateRandomId() {
        $cryptoStrong = false;
        $octets = openssl_random_pseudo_bytes(5, $cryptoStrong);
        return bin2hex($octets);
    }
    
    public function __construct($id, $content, $idArticle, $idAuthor, $loginAuthor) {
        
        $this->setId($id);
        $this->setContent($content);
        $this->setIdArticle($idArticle);
        $this->setIdAuthor($idAuthor);
        $this->setLoginAuthor($loginAuthor);
    }
    
    public static function getDefaultCommentaire() {
        $commentaire = new Commentaire("6666666666", "Contenu commentaire test", "0000000000", "4", "Admin");
        $commentaire->id = self::generateRandomId();
        $commentaire->content = "";
        $commentaire->idArticle = "";
        $commentaire->idAuthor = "";
        $commentaire->loginAuthor = "";
        
        return $commentaire;
    }
}
