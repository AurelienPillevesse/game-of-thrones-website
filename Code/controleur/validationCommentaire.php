<?php

    $dataError = array();
    if(empty($_POST['idArticle'])) {
        $idArticle = "";
        $dataError['idArticle'] = "Titre incorrect";
    } else {
        $idArticle = filter_var($_POST['idArticle'], FILTER_SANITIZE_STRING);
    }
    
    if(empty($_POST['content'])) {
        $content = "";
        $dataError['content'] = "Contenu incorrect";
    } else {
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    }