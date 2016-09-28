<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Deconnexion {
    
    public static function finishSession(&$dataError) {
        if(!isset($_COOKIE['session-id'])) {
            $dataError['no-session-cookie'] = "No session cookie";
            return new Model($dataError);
        }
        
        session_start();
        unset($_COOKIE['session-id']);
        setcookie('session-id', '', 1);
        session_unset();
        session_destroy();
        
        return new Model($dataError);
    }
    
}