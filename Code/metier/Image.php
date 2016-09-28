<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author Aurélien
 */

require (dirname(__FILE__).'/regex.php');
require (dirname(__FILE__).'/ImagePropertiesTrait.php');

class Image {
    private $id;
    private $idArticlePersonnage;
    private $path;
    
    use ImagePropertiesTrait;
    
    public function __construct($id, $idArticlePersonnage, $path) {
        $this->setId($id);
        $this->setIdArticlePersonnage($idArticlePersonnage);
        $this->setPath($path);
    }
    
    public static function getDefaultImage() {
        $image = new Image("4", "4821ab684a", "michel.jpg");
        $image->id = "";
        $image->idArticlePersonnage = "";
        $image->path = "";
        return $image;
    }
}
