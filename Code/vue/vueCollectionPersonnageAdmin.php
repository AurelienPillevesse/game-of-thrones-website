<?php
include 'communFonctions.php';
outputEnTeteHTML("Personnages");
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

                <?php
                    $cmpt = 0;
                    $tabPersonnage = $modele->getData();
                    foreach ($tabPersonnage as $personnage) {
                ?>
                
                <table>
                    <?php
                        $nombreImage = $personnage->getNbImage();
                        if($nombreImage == 1) { 
                    ?>
                <tr>
                    <img src="ressources/<?php echo $collectionImagePersonnage[$cmpt]->getData()->getPath(); ?>" alt="" style="display:block; margin-left: auto; margin-right: auto"/>
                </tr>
                    <?php } ?>
                <tr>
                    <td>
                        <p>Nom : <?php echo $personnage->getNom(); ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Age : <?php echo $personnage->getAge(); ?></td>	
                </tr>
                <tr>
                    <td>Description : <?php echo $personnage->getDescription();  ?></td>			
                </tr>
                </table>
                <br/>
                <?php if($nombreImage == 0) { ?>
                <a class="btn btn-primary" href="?action=ajouterImagePersonnage&idArticlePersonnage=<?php echo $personnage->getId(); ?>">Ajouter image <i class="fa fa-angle-right"></i></a>
                <?php } else { ?>
                <a class="btn btn-primary" href="?action=deleteImagePersonnage&idArticlePersonnage=<?php echo $personnage->getId(); ?>">Supprimer image <i class="fa fa-angle-right"></i></a>
                <?php } ?>
                <a class="btn btn-primary" href="?action=modifyPersonnage&id=<?php echo $personnage->getId(); ?>">Modifier <i class="fa fa-angle-right"></i></a>
                <a class="btn btn-primary" href="?action=deletePersonnage&id=<?php echo $personnage->getId(); ?>">Supprimer <i class="fa fa-angle-right"></i></a>
                <br/>
                <hr>
                <?php
                    $cmpt++;
                    }
                    if($cmpt == 0) {
                        echo "Il n'y a pas de personnages pour le moment.<br/>";
                        echo "<hr>";
                    }
                ?>

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


