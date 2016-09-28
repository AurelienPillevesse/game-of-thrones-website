<?php

    $id = filter_var($_REQUEST['idArticlePersonnage'], FILTER_SANITIZE_STRING);
    
    if(!empty($_FILES['imagePath'])) {
        $type = "";
        if(strlen($_FILES['imagePath']['type']) > 4) {
            for ($i = 0; $i < 5; $i++) {
                $type .= $_FILES['imagePath']['type'][$i];
            }
        }
        $img = filter_var($_FILES['imagePath']['name'], FILTER_SANITIZE_STRING);
    }