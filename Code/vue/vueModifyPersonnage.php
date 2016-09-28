<?php
include 'communFonctions.php';
outputEnTeteHTML("Personnage");
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liste des personnages
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Personnages</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">
                
                <p>> Modification du personnage :</p>
                <form action="?action=editPersonnage" name="saisieCommentaire" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                    <div class="col-md-8">
                        <label>Nom : </label>
                        <input name="nom" value="<?php echo $modele->getData()->getNom(); ?>" class="form-control" type="text" required/></div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-md-8">
                        <label>Age : </label>
                        <input name="age" value="<?php echo $modele->getData()->getAge(); ?>" class="form-control" type="text" required/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-8">
                        <label>Description : </label>
                        <textarea rows="9" name="description" class="form-control" required><?php echo $modele->getData()->getDescription(); ?></textarea>
                        <input type="hidden" name="idPersonnage" value="<?php echo $modele->getData()->getId(); ?>" />
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


