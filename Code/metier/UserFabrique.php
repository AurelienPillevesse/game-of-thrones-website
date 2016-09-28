<?php
require (dirname(__FILE__).'/User.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserFabrique
 *
 * @author Aurélien
 */
class UserFabrique {
    public static function getUser(&$dataErrors, $login, $password) {
        $user = User::getDefaultUser();
        $dataErrors = array();
        
        try {
            $user->setLogin($login);
        } catch (Exception $e) {
            $dataErrors['login'] = $e->getMessage()."<br/>\n";
        }
        
        try {
            $user->setPassword($password);
        } catch (Exception $e) {
            $dataErrors['password'] = $e->getMessage()."<br/>\n";
        }
        
        /*try {
            $user->setEmail($email);
        } catch (Exception $e) {
            $dataErrors['email'] = $e->getMessage()."<br/>\n";
        }*/
        
        return $user;
    }
}
