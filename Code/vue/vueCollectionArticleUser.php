<?php
include 'communFonctions.php';
outputEnTeteHTML("Articles");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Liste des articles
                    <!--<small>Subheading</small>-->
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

                <?php
                $tabArticle = $modele->getData();
                $i = 0;
                    foreach ($tabArticle as $article) {
                        $i++;
                ?>
                
                <h2>
                    <a href="?action=get&id=<?php echo $article->getId(); ?>"><?php echo $article->getTitle(); ?></a>
                </h2>
                <p><i class="fa fa-clock-o"></i> Post&eacute; le <i><?php echo $article->getDatePublication(); ?></i> par <u><?php echo $article->getLoginAuthor(); ?></u></p>

                <p><?php echo $article->getContent(); ?></p>
                <br/>
                <a class="btn btn-primary" href="?action=get&id=<?php echo $article->getId(); ?>">Afficher <i class="fa fa-angle-right"></i></a>
                <hr>
                
                <?php
                    }
                    if($i == 0) {
                        echo "<h2>Sorry !<br/>Il n'y a pas d'article pour le moment.";
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


