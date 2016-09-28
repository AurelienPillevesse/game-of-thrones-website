<?php
include dirname(dirname(__FILE__)).'/communFonctions.php';
outputEnTeteHTML("Saisie valide");
?>

    <meta http-equiv="refresh" content="1; URL=?action=get-all-personnage"/>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Information
                    <small>Saisie valide</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Saisie valide</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1><span class="error-404"></span>
                    </h1>
                    <img style="float:right; width:auto; height:auto; max-width:120px; max-height:100px" src="./img/greenCheck.png" alt="greenCheck"/>
                    <p style="clear:both">
                        Ton image a &eacute;t&eacute; soumise !
                    </p>
                </div>
            </div>

        </div>

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Aur&eacute;lien Pillevesse et Pierre Flaudias - Copyright &copy; Game of News 2015</p>
                </div>
            </div>
        </footer>

    </div>

</body>

</html>
