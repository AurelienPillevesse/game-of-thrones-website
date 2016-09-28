<?php
include 'communFonctions.php';
outputEnTeteHTML("Connexion");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Connexion
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Connexion</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="panel-body">
                
                <form action="?action=validateAuth" name="connexion" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                    <div class="col-md-8">
                        <input name="login" placeholder="Login" class="form-control" type="text" required/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-8"><input name="password" placeholder="Mot de passe" class="form-control" type="password" required/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Se connecter"/></div>
                    </div>
                </form>
                
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


