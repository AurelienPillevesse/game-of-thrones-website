<?php

require (dirname(__FILE__).'/regex.php');
require (dirname(__FILE__).'/PersonnagePropertiesTrait.php');

/**
 * Description of Article
 *
 * @author Aurélien
 */
class Personnage {
    
    private $id;
    private $nom;
    private $description;
    private $age;
    private $nbImage;
    
    use PersonnagePropertiesTrait;
    
    private static function generateRandomId() {
        $cryptoStrong = false;
        $octets = openssl_random_pseudo_bytes(5, $cryptoStrong);
        return bin2hex($octets);
    }
    
    public function __construct($id, $nom, $description, $age, $nbImage) {
        
        $this->setId($id);
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setAge($age);
        $this->setNbImage($nbImage);
    }
    
    public static function getDefaultPersonnage() {
        $personnage = new Personnage("6666666666", "Nom personnage test", "Presentation personnage test", "160 Ans", 0);
        $personnage->id = self::generateRandomId();
        $personnage->nom = "";
        $personnage->description = "";
        $personnage->age = "";
        $personnage->nbImage = "";

        return $personnage;
    }
}