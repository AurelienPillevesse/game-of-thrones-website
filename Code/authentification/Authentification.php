<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authentification
 *
 * @author Pierre
 */
class Authentification {
    public static function checkAndInitiateSession(&$dataError, $login, $password) {
        if(!empty($dataError)) {
            return new Model($dataError);
        }
        
        $userModel = ModelUser::getModelUser($login, hash("md5", $password));
        if($userModel->getError() !== false) {
            return $userModel;
        }
        
        $mySid = AuthUtils::generateSessionId();
        session_id($mySid);
        setcookie("session-id", $mySid, time()+60*2);
        
        session_start();
        session_destroy();
        session_cache_expire(2);
        session_id($mySid);
        session_start();
        $userModel->fillSessionData();
        session_write_close();
        return $userModel;
    }
        
    public static function restoreSession() {

        $dataError = array();
        
        if(!isset($_COOKIE['session-id']) || !preg_match("/^[0-9a-fA-F]{20}$/", $_COOKIE['session-id'])){
            $dataError['no-cookie'] = "Votre cookie a peut être expiré. Veuillez vous reconnecter";
            $userModel = new Model($dataError);
        }
        
        else{
            $mySid = $_COOKIE['session-id'];
            
            session_id($mySid);
            
            session_start();
            setcookie("session-id", $mySid, time()+60*2);
            
            $userModel = ModelUser::getModelUserFromSession();
            session_write_close();
        }
        
        return $userModel;
    }
}