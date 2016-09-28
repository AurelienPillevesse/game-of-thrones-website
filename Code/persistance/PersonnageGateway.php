<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PersonnageGateway {
    
    public static function getPersonnageById(&$dataError, $id) {
        if(isset($id)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM Personnage WHERE id = ?', array($id));
            if(isset($queryResults) && is_array($queryResults)) {
                if(count($queryResults) == 1) {
                    $row = $queryResults[0];
                    $personnage = PersonnageFabrique::getPersonnage($dataError, $row['id'], $row['nom'], $row['description'], $row['age']);
                } else {
                    $dataError['persistance'] = "Personnage introuvable";
                }
            } else {
                $dataError['persistance'] = "Impossible d'acceder aux données";
            }
        }
        return $personnage;
    }


    public static function getPersonnageAll(&$dataError) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM personnage ORDER BY nom ASC', array());
        $collectionPersonnage = array();
        
        if($queryResults !== false) {
            foreach ($queryResults as $row) {
                $personnage = PersonnageFabrique::getPersonnage($dataError, $row['id'], $row['nom'], $row['description'], $row['age'], $row['nbImage']);
                $collectionPersonnage[] = $personnage;
            }
        } else {
            $dataError['persistance'] = "Problème d'accès aux données";
        }
        return $collectionPersonnage;
    }
    
    public static function putPersonnage(&$dataError, $nom, $age, $description, $value) {
        $personnage = PersonnageFabrique::getPersonnage($dataError, "0000000000", $nom, $description, $age);
        
        if(empty($dataError)) {
            $queryResults = false;
            $count = 0;
            
            while($queryResults === false && $count <= 3) {
                $personnage->setId(Config::generateRandomId());
                $count++;
                $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO Personnage(id, nom, age, description, nbImage) VALUES (?, ?, ?, ?, ?)',
                    array($personnage->getId(),
                        $personnage->getNom(),
                        $personnage->getAge(),
                        $personnage->getDescription(),
                        $value
                        ));
            }
            if($queryResults === false) {
                $dataError["persistance"] = "Probleme d'execution de la requete";
            }
        }
        return $personnage;
    }
    
    public static function postPersonnage(&$dataError, $id, $nom, $age, $description) {
        $personnage = PersonnageFabrique::getPersonnage($dataError, $id, $nom, $description, $age);
        
        if(empty($dataError)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery("UPDATE Personnage SET nom=?, age=?, description=? WHERE id=?",
                    array($personnage->getNom(),
                        $personnage->getAge(),
                        $personnage->getDescription(),
                        $personnage->getId()
                    ));
            if($queryResults === false) {
                $dataError['persistance'] = "Probleme d'acces aux donnees";
            }
        }
        return $personnage;
    }
    
    public static function deletePersonnage(&$dataError, $id) {
        if(empty($dataError)) {
            $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('DELETE FROM Personnage WHERE id=?', array($id));
            if($queryResults === false) {
                $dataError['persistance'] = "Probleme execution de la requete";
            }
        }
        return null;
    }
    
    public static function updateImagePersonnage(&$dataError, $id, $value) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery("UPDATE Personnage SET nbImage=? WHERE id=?",
                array($value,
                    $id
                ));
        
        if($queryResults === false) {
            $dataError['persistance'] = "Probleme d'acces aux donnees";
        }
    }
}
