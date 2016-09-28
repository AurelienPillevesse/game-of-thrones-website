<?php

require (dirname(__FILE__).'/Personnage.php');

class PersonnageFabrique {
    
    public static function getPersonnage(&$dataError, $id, $nom, $description, $age, $nbImage = null) {
        $personnage = Personnage::getDefaultPersonnage();
        $dataError = array();
        
        try {
            $personnage->setId($id);
        } catch (Exception $ex) {
            $dataError['id'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $personnage->setNom($nom);
        } catch (Exception $ex) {
            $dataError['nom'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $personnage->setDescription($description);
        } catch (Exception $ex) {
            $dataError['description'] = $ex->getMessage()."<br/>\n";
        }
        
        try {
            $personnage->setAge($age);
        } catch (Exception $ex) {
            $dataError['age'] = $ex->getMessage()."<br/>\n";
        }
         try {
             $personnage->setNbImage($nbImage);
         } catch (Exception $ex) {
             $dataError['nbImage'] = $ex->getMessage()."<br/>\n";
         }
        
        return $personnage;
    }
    
}