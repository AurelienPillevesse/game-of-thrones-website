<?php

    $dataError = array();
    if(empty($_POST['title'])) {
        $title = "";
        $dataError['title'] = "Titre incorrect";
    } else {
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    }
    
    if(empty($_POST['content'])) {
        $content = "";
        $dataError['content'] = "Contenu incorrect";
    } else {
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    }