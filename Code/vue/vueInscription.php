<?php
include 'communFonctions.php';
outputEnTeteHTML("Inscription");
?>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inscription
                    <!--<small>Subheading</small>-->
                </h1>
                <ol class="breadcrumb">
                    <li><a href="?action=accueil">Home</a>
                    </li>
                    <li class="active">Inscription</li>
                </ol>
            </div>
        </div>

        <div class="row">

            <div class="panel-body">
                
                <form action="?action=putUser" name="inscription" role="form" class="form-horizontal" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        <div class="col-md-8">
                        <?php if(!empty($text)) { ?>
                        <label><?php echo $text; ?></label>
                        <?php } ?>
                        <?php if(!empty($messageLogin)) { ?>
                        <label><?php echo $messageLogin; ?></label>
                        <?php } ?>
                        <input name="login" placeholder="Login" class="form-control" type="text" required/>
                        </div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-8">
                        <?php if(!empty($messagePassword)) { ?>
                        <label><?php echo $messagePassword; ?></label>
                        <?php } ?>
                        <input name="password" placeholder="Mot de passe" class="form-control" type="password" required/></div>
                    </div> 

                    <div class="form-group">
                    <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success btn btn-success" type="submit" value="S'inscrire"/></div>
                    </div>
                </form>
                
            </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
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


