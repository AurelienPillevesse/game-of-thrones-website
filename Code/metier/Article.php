<?php

require (dirname(__FILE__).'/regex.php');
require (dirname(__FILE__).'/ArticlePropertiesTrait.php');

/**
 * Description of Article
 *
 * @author Aurélien
 */
class Article {
    
    private $id;
    private $title;
    private $content;
    private $idAuthor;
    private $datePublication;
    private $loginAuthor;
    private $nbImage;
    
    use ArticlePropertiesTrait;
    
    private static function generateRandomId() {
        $cryptoStrong = false;
        $octets = openssl_random_pseudo_bytes(5, $cryptoStrong);
        return bin2hex($octets);
    }
    
    public function __construct($id, $title, $content, $idAuthor, $loginAuthor, $nbImage) {
        
        $this->setId($id);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setIdAuthor($idAuthor);
        $this->setLoginAuthor($loginAuthor);
        $this->setNbImage($nbImage);
    }
    
    public static function getDefaultArticle() {
        $article = new Article("6666666666", "Titre article test", "Contenu article test", "4", "Admin", "0");
        $article->id = self::generateRandomId();
        $article->title = "";
        $article->content = "";
        $article->idAuthor = "";
        $article->loginAuthor = "";
        $article->nbImage = "";

        return $article;
    }
}

?>