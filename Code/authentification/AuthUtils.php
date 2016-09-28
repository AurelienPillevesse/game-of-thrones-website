<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AuthUtils
 *
 * @author Pierre
 */
class AuthUtils {
    
    public static function isStrongPassword($wouldBePassword) {
        $lengthCondition = (strlen($wouldBePassword) >= 8 && strlen($wouldBePassword) <= 35);
        
        $characterCondition = preg_match("/[a-z]/", $wouldBePassword)
                && preg_match("/[A-Z]/", $wouldBePassword)
                && preg_match("/[0-9]/", $wouldBePassword);
        
        return $lengthCondition && $characterCondition;
    }
    
    public static function generateSessionIdAndCookie($ipAdress, &$mySid_part1) {
        $cryptoStrong = false;
        
        $octets = openssl_random_pseudo_bytes(5, $cryptoStrong);
        $mySid_part1 = bin2hex($octets);
        
        $mySid_part2 = hash("md5", $ipAdress);
        
        $mySid = $mySid_part1.$mySid_part2;
        
        return $mySid;
    }
    
    public static function generateSessionId() {
        $cryptoStrong = false;
        $octets = openssl_random_pseudo_bytes(10, $cryptoStrong);
        $mySid = bin2hex($octets);
        return $mySid;
    }
    
    public static function userPasswordCheckInDataBase(&$dataError, $login, $hashedPassword) {
        $isPassword = UserGateway::getRoleByPassword($dataError, $login, $hashedPassword);
        if($isPassword === false || $isPassword === ""){
            return false;
        }
        return true;
    }
}
