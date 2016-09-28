<?php

require (dirname(__FILE__).'/UserPropertiesTrait.php');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Aurélien
 */
class User {
   
    private $login;
    private $password;
    private $dateInscription;
    
    
    use UserProperties;
    
    public function __construct($login, $password) {
        $date = new \DateTime();
        
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setDateInscription($date);
    }
    
    public static function getDefaultUser() {
        $user = new User("Bonjour", "ThisIsATest");
        $user->login = "";
        $user->password = "";
        return $user;
    }
}