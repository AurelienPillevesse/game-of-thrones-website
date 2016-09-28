<?php
include 'communFonctions.php';
outputEnTeteHTML("Saisie d'une image");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Saisie d'une image
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Saisie d'une image</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="panel-body">
                
                <form role="form" method="post" enctype="multipart/form-data" action="?action=putImagePersonnage">
                    <input type="file" id="imagePath" name="imagePath"/>
                    <input type="hidden" name="idArticlePersonnage" value="<?php echo $id; ?>" />
                    <br/>
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


