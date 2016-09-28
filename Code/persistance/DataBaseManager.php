<?php

class DataBaseManager {
    static private $dbh = null;
    static private $instance = null;
    
    static private $db_host="mysql:host=localhost;";
    static private $db_name="dbname=blogphp";
    //dbaupilleves;
    static private $db_user="root";
    static private $db_password="";
    //aurelien1;
    
    private function __construct() {
        try{
            self::$dbh = new PDO(self::$db_host.self::$db_name, self::$db_user, self::$db_password);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erreur de connexion à la base de données.");
        }
        self::$dbh->exec("SET NAMES 'UTF8'");
    }
    
    public static function getInstance() {
        if(null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function prepareAndExecuteQuery($requete, $args) {
        $numargs = count($args);
        $pattern = '/(\"|\')+/';
        
        if(empty($requete) || !is_string($requete) || preg_match($pattern, $requete) !== 0) {
            throw new Exception("Erreur concernant la sécurité. Requete incompletement préparée.");
        }
        
        try {
        $statement = self::$dbh->prepare($requete);
        if($statement !== false) {
            for($i = 1 ; $i <= $numargs ; $i++) {
                $statement->bindParam($i, $args[$i-1]);
            }
            
            $statement->execute();
        }} catch (Exception $e) {
            return false;
        }
        
        if($statement === false) {
            return false;
        }
        
        try {
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $statement->closeCursor();
        } catch (PDOException $ex) {
            $results = true;
        }
        
        $statement = null;
        return $results;
    }
    
    public static function destroyQueryResults(&$statement) {
        $statement->closeCursor();
        $statement = null;
    }
    
    private function __clone() {}   
}

