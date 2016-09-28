<?php

    $dataError = array();
    $wouldBePasswd = $_POST['password'];
    if(empty($wouldBePasswd) || !AuthUtils::isStrongPassword($wouldBePasswd)) {
        $password = "";
        $dataError['password'] = "Mot de passe incorrect, votre mot de passe doit contenir au moins 8 caracteres, une minuscule, une majuscule, un chiffre et un caractere parmis ".htmlentities ( "#-|.@[]= !& " , ENT_QUOTES, "utf-8")."";
    } else {
        $password = htmlentities($wouldBePasswd);
        $password = filter_var($password, FILTER_SANITIZE_STRING);
    }
    
    if(filter_var($_POST['login'], FILTER_SANITIZE_STRING) === false || strlen($_POST['login']) < 4) {
        $login = "";
        $dataError['login'] = "Login incorrect, sa longueur doit être d'au moins 4 caracteres";
    } else {
        $login = htmlentities($_POST['login']);
        $login = filter_var($login, FILTER_SANITIZE_STRING);
    }