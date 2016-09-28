<?php
include 'communFonctions.php';
outputEnTeteHTML("Commentaires");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Commentaires
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a></li>
                    <li><a href="?action=get-all">Articles</a></li>
                    <li class="active">Commentaires</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">
                
                <h2>
                    <a href="?action=get&id=<?php echo $modeleArticle->getData()->getId(); ?>"><?php echo $modeleArticle->getData()->getTitle(); ?></a>
                </h2>
                <p><i class="fa fa-clock-o"></i> Post&eacute; le <i><?php echo $modeleArticle->getData()->getDatePublication(); ?></i> par <u><?php echo $modeleArticle->getData()->getLoginAuthor(); ?></u></p>
                <div>
                    <?php
                        if(!empty($modeleImage)) {
                            echo '<br/>';
                            echo '<img src="ressources/'.$modeleImage->getData()->getPath().'" style="display:block; margin-left: auto; margin-right: auto"/>';
                            echo '<br/>';
                        }
                    ?>
                </div>
                <p><?php echo $modeleArticle->getData()->getContent(); ?></p>

                <hr>
                <?php
                $tabComment = $modeleComment->getData();
                $i = 0;
                    foreach ($tabComment as $comment) {
                        $i++;
                ?>
                
                <p><i class="fa fa-clock-o"></i> Post&eacute; le <?php echo $comment->getDatePublication(); ?> par <u><?php echo $comment->getLoginAuthor(); ?></u> </p>

                <p><?php echo $comment->getContent(); ?></p>
                
                <hr>
                
                <?php
                    }
                    if($i == 0) {
                        echo "<p style=\"font-weight: bold\">Il n'y a pas de commentaires sur cet article pour le moment.<br/>Soyez le premier !<br/></p>";
                        echo "<hr>";
                    }
                ?>
                
                <form action="?action=putComment" name="saisieCommentaire" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        <div class="col-md-8"><input name="pseudo" value="Pseudo : <?php echo $_SESSION['login']; ?>" class="form-control" type="text" readonly/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-8">
                        <textarea rows="9" name="content" placeholder="Contenu du commentaire" class="form-control"></textarea>
                        <input type="hidden" name="idArticle" value="<?php echo $id; ?>" />
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


