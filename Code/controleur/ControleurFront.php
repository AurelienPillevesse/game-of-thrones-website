<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControleurFront
 *
 * @author Pierre
 */
class ControleurFront {
    
    function redirectionNotAccess() {
        require (Config::getVuesErreur()['notAccess']);
    }
    
    function __construct() {
        try {
            $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

            $modelUser = Authentification::restoreSession();
            $role = ($modelUser->getError() === false) ? $modelUser->getRole() : "";
            
            switch ($action) {
                case "inscription":
                case "putUser":
                case "auth":
                case "validateAuth":
                    if($role == "") {
                        $publicControl = new ControleurPublic($action);
                    } else {
                        $this->redirectionNotAccess();
                    }
                    break;
                case "saisie":
                case "putArticle":
                case "modifyArticle":
                case "editArticle":
                case "deleteArticle":
                case "saisiePersonnage":
                case "putPersonnage":
                case "modifyPersonnage":
                case "editPersonnage":
                case "deletePersonnage":
                case "deleteComment":
                case "ajouterImage":
                case "ajouterImagePersonnage":
                case "putImage":
                case "putImagePersonnage":
                case "deleteImage":
                case "deleteImagePersonnage":
                    if($role == "admin"){
                        $adminControl = new ControleurAdmin($action);
                    } else {
                        $this->redirectionNotAccess();
                    }
                    break;
                case "get":
                    if($role == "admin") {
                        $adminControl = new ControleurAdmin($action);
                    } elseif($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $publicControl = new ControleurPublic($action);
                    }
                    break;
                case "putComment":
                    if($role == "admin") {
                        $adminControl = new ControleurAdmin($action);
                    } elseif($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $this->redirectionNotAccess();
                    }
                    break;
                case "get-all":
                    if($role == "admin") {
                        $adminControl = new ControleurAdmin($action);
                    } elseif($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $publicControl = new ControleurPublic($action);
                    }
                    break;
                case "get-all-personnage":
                    if($role == "admin") {
                        $adminControl = new ControleurAdmin($action);
                    } elseif($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $publicControl = new ControleurPublic($action);
                    }
                    break;
                case "deconnexion":
                    if($role == "admin") {
                        $adminControl = new ControleurAdmin($action);
                    } elseif ($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $this->redirectionNotAccess();
                    }
                    break;
                default:
                    if($role == "admin"){
                        $adminControl = new ControleurAdmin($action);
                    } elseif ($role == "user") {
                        $userControl = new ControleurUser($action);
                    } else {
                        $publicControl = new ControleurPublic($action);
                    }
                    break;
            }
            
        } catch (Exception $exc) {
            $model = new Model(array('exception' => $exc->getMessage()));
            require (Config::getVuesErreur()['default']);
        }
    }
}
