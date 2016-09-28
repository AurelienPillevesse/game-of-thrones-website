<?php

    function outputEnTeteHTML($title) {
        headerHTML($title);
        navigationBar();
    }
    
    function headerHTML($title) {
        echo '<!DOCTYPE html>';
        echo '<html lang="fr">';

        echo '<head>';

            echo '<meta charset="utf-8">';
            echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
            echo '<meta name="description" content="">';
            echo '<meta name="author" content="">';

            echo '<title>Game of News | '.$title.'</title>';

            echo '<link href=".\Bootstrap\css\bootstrap.min.css" rel="stylesheet">';
            echo '<link href=".\Bootstrap\css\modern-business.css" rel="stylesheet">';
            echo '<link href=".\Bootstrap\font-awesome\css\font-awesome.min.css" rel="stylesheet" type="text/css">';

            echo '<!--[if lt IE 9]>';
                echo '<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>';
                echo '<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>';
            echo '<![endif]-->';

        echo '</head>';
    }
    
    function navigationBar() {
        echo '<body>';

            echo '<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">';
                echo '<div class="container">';
                    echo '<div class="navbar-header">';
                        echo '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">';
                            echo '<span class="sr-only">Toggle navigation</span>';
                            echo '<span class="icon-bar"></span>';
                            echo '<span class="icon-bar"></span>';
                            echo '<span class="icon-bar"></span>';
                        echo '</button>';
                        echo '<a class="navbar-brand" href="?action=accueil">Game of News</a>';
                    echo '</div>';
                    echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
                        echo '<ul class="nav navbar-nav navbar-right">';
                            echo '<li>';
                                echo '<a href="?action=accueil">Accueil</a>';
                            echo '</li>';
                            echo '<li>';
                                echo '<a href="?action=get-all">Articles</a>';
                            echo '</li>';
                            
                            $modelUser = ModelUser::getModelUserFromSession();
                            $role = $modelUser->getRole();
                            if($role == 'admin') {
                                echo '<li>';
                                    echo '<a href="?action=saisie">Ajouter un article</a>';
                                echo '</li>';
                            }
                            echo '<li>';
                                echo '<a href="?action=get-all-personnage">Personnages</a>';
                            echo '</li>';
                            if($role == 'admin') {
                                echo '<li>';
                                    echo '<a href="?action=saisiePersonnage">Ajouter un personnage</a>';
                                echo '</li>';
                            }
                            if($role == '') {
                                echo '<li>';
                                    echo '<a href="?action=auth">Connexion</a>';
                                echo '</li>';
                                echo '<li>';
                                    echo '<a href="?action=inscription">Inscription</a>';
                                echo '</li>';
                            }
                            if($role == 'user' || $role == 'admin') {
                                echo '<li>';
                                    echo '<a href="?action=deconnexion">D&eacute;connexion</a>';
                                echo '</li>';
                            }
                            if(!empty($_SESSION['login'])) {
                                echo '<li>';
                                echo '<a style="margin-left: 60px">Login : '.$_SESSION['login'].'</a>';
                                echo '</li>';
                            }
                        echo '</ul>';
                    echo '</div>';
                echo '</div>';
            echo '</nav>';
    }

    function footerHTML() {
        
        echo "<footer>";
        echo "PILLEVESSE Aur&eacute;lien et FLAUDIAS Pierre, GROUPE 2.";
        echo "</footer>";
    }
    
    function outputFinFichierHTML() {
         echo "</body>\n</html>\n";
    }
    
?>