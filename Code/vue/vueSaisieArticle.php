<?php
include 'communFonctions.php';
outputEnTeteHTML("Saisie d'un article");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Saisie d'un article
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Saisie d'un article</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="panel-body">
                
                <form action="?action=putArticle" name="saisieArticle" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                    <div class="col-md-8"><input name="title" placeholder="Titre" class="form-control" type="text" required/></div>
                    </div> 

                    <div class="form-group">
                        <div class="col-md-8"><textarea rows="9" name="content" placeholder="Contenu de l'article" class="form-control" required></textarea></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="Valider"/></div>
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


