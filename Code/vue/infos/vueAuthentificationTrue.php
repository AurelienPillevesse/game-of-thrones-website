<?php
include dirname(dirname(__FILE__)).'/communFonctions.php';
outputEnTeteHTML("Connexion &eacute;tablie");
?>

    <meta http-equiv="refresh" content="1; URL=index.php"/>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Information
                    <small>Connexion &eacute;tablie</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Connexion &eacute;tablie</li>
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
                        Bonjour <?php echo $_SESSION['login'] ?> <br/>
                        Tu es maintenant connect&eacute; !
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
