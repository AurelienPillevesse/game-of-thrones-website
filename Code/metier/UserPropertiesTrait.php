<?php

trait UserProperties {

public function getLogin() {
        return $this->login;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getDateInscription() {
        return $this->dateInscription;
    }
    
    
    public function setLogin($login) {
        $this->login = $login;
    }
    public function setPassword($password) {
        $encodePassword = md5($password);
        $this->password = $encodePassword;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setDateInscription($dateInscription) {
        $this->dateInscription = $dateInscription;
    }
}