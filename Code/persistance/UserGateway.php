<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserGateway
 *
 * @author Pierre
 */
class UserGateway {
    
    public static function putUser(&$dataError, $login, $password) {
        $user = UserFabrique::getUser($dataError, $login, $password);
        $availableLogin = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT id FROM User WHERE login=?', array($login));
        
        if(empty($dataError) && empty($availableLogin)) {
            $queryResult = false;
            $count = 0;
            
            while ($queryResult === false && $count <= 3) {
                $count++;
                $queryResult = DataBaseManager::getInstance()->prepareAndExecuteQuery('INSERT INTO User(login, password, role, dateInscription) VALUES (?, ?, ?, NOW())',
                        array($user->getLogin(),
                            $user->getPassword(),
                            'user'));
            }
            if($queryResult === false) {
                $dataError['persistance'] = "Probleme execution de la requete";
            }
        }
        
        if(!empty($availableLogin)) {
            $dataError['login-notavailable'] = "Login is not available";
        }
        
        return $user;
    }
    
    public static function getRoleByPassword(&$dataError, $login, $hashedPassword) {
        $queryResults = DataBaseManager::getInstance()->prepareAndExecuteQuery('SELECT * FROM User WHERE login = ?', array($login));
        
        if($queryResults !== false){
            if(count($queryResults) == 1) {
                $row = $queryResults[0];
            }
            
            if(count($queryResults) != 1 || $row['password'] != $hashedPassword) {
                $dataError['login'] = "Impossible d'accéder à la table des utilisateurs";
                return "";
            }
            return $row['role'];
        } else {
            $dataError['login'] = "Impossible d'acceder à la table des utilisateurs";
            return "";
        }
    }
}
