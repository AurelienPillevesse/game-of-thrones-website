<?php
include 'communFonctions.php';
outputEnTeteHTML("Article");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liste des articles
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Articles</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">
                
                <p>> Modification de l'article :</p>
                <form action="?action=editArticle" name="saisieCommentaire" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                    <div class="col-md-8">
                        <label>Titre : </label>
                        <input name="title" value="<?php echo $modele->getData()->getTitle(); ?>" class="form-control" type="text" required/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-8">
                        <label>Contenu : </label>
                        <textarea rows="9" name="content" class="form-control" required><?php echo $modele->getData()->getContent(); ?></textarea>
                        <input type="hidden" name="idArticle" value="<?php echo $modele->getData()->getId(); ?>" />
                    </div>
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


