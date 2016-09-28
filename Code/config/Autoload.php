<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Autoload
 *
 * @author Aurélien
 */
class Autoload {
    private static $m_instance = null;
    
    public static function load() {
        if(self::$m_instance !== null) {
            throw new Exception("Erreur l'autoload ne peut être chargée qu'une seule fois : ".__CLASS__);
        }
        self::$m_instance = new self();
        if(!spl_autoload_register(array(self::$m_instance, 'autoloadCallback'), false)) {
            throw new Exception("Impossible de lancer l'autoload : ".__CLASS__);
        }
    }
    
    public static function shutDown() {
        if(self::$m_instance !== null) {
            if(!spl_autoload_unregister(array(self::$m_instance, '__autoload'))) {
                throw new Exception("Impossible d'arrêter l'autoload : ".__CLASS__);
            }
            self::$m_instance = null;
        }        
    }
    
    private static function autoloadCallback($class) {
        global $rootDirectory;
        $sourceFileName = $class.'.php';
        $directoryList = array('', 'authentification\\', 'config\\', 'controleur\\', 'deconnexion\\', 'metier\\', 'modele\\', 'persistance\\', 'vue\\classes\\', 'vue\\infos\\', 'vue\\errors\\');
        foreach ($directoryList as $subDir) {
            $filePath = $rootDirectory.$subDir.$sourceFileName;
            if(file_exists($filePath)) {
                include ($filePath);
            }
        }
    }
}