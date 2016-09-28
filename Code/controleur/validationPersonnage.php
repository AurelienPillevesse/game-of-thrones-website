<?php

    $dataError = array();
    if(empty($_POST['nom'])) {
        $nom = "";
        $dataError['nom'] = "Titre incorrect";
    } else {
        $nom = filter_var($_POST['nom'], FILTER_SANITIZE_STRING);
    }
    
    if(empty($_POST['age'])) {
        $age = "";
        $dataError['age'] = "Contenu incorrect";
    } else {
        $age = filter_var($_POST['age'], FILTER_SANITIZE_STRING);
    }
    
    if(empty($_POST['description'])) {
        $description = "";
        $dataError['description'] = "Contenu incorrect";
    } else {
        $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    }
    
    if(empty($_POST['idPersonnage'])) {
        $idPersonnage = "";
    } else {
        $idPersonnage = filter_var($_POST['idPersonnage'], FILTER_SANITIZE_STRING);
    }