<?php

$rootDirectory = dirname(__FILE__)."\\";

require_once ($rootDirectory.'config/Autoload.php');

try{
    Autoload::load();
}  catch (Exception $e){
    require (Config::getVuesErreur()['default']);
}

$cont = new ControleurFront();
