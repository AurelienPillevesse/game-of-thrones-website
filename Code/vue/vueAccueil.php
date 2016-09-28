<?php
include 'communFonctions.php';
outputEnTeteHTML("Accueil");
?>

    <header id="myCarousel" class="carousel slide">
        <div class="fill" style="background-image:url(./img/img-couverture-site.jpg);"></div>
    </header>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Bienvenue sur Game of News ! <br/>
                    Nous sommes le <?php echo date('d/m/y'); ?>. <br/>
                    Il est actuellement <?php echo date('g:i A'); ?>.
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-check"></i> Nouveaut&eacute;s</h4>
                    </div>
                    <div class="panel-body">
                        <p>A partir de maintenant, vous pouvez consulter notre site autant que vous le souhaitez car le d&eacute;veloppement est maintenant terminer. On vous attends parmi nous, inscrivez vous vite !</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-gift"></i> Concours</h4>
                    </div>
                    <div class="panel-body">
                        <p>Pour f&ecirc;ter cette nouvelle ann&eacute;e, l'&eacute;quipe du site vous souhaite une bonne ann&eacute;e et a d&eacute;cid&eacute; de vous offrir des cadeaux !<br/> Rendez-vous le 15 janvier pour en savoir plus.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><i class="fa fa-fw fa-compass"></i> Ils en ont parl&eacute;</h4>
                    </div>
                    <div class="panel-body">
                        <p>
                            "<strong>Vraiment un site tr&egrave;s int&eacute;ressant</strong>" - TF1<br/>
                            "<strong>Un site pour les vrais fans de la s&eacute;rie</strong>" - BFMTV<br/>
                            "<strong>Un paradis pour les fans de la s&eacute;rie</strong>" - LeMonde<br/>
                            "<strong>A d&eacute;couvrir de tout urgence</strong>" - La Montagne
                        </p>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Mais &agrave; quoi sert votre site ?</h2>
            </div>
            <div class="col-md-6">
                <p>Sur ce site, vous pourrez :</p>
                <ul>
                    <li>Lire nos articles sur le s&eacute;rie</li>
                    <li>Lire une pr&eacute;sentation de tous les personnages</li>
                    <li>Poster des commentaires suite &agrave; des articles</li>
                    <li><strong>Tout &ccedil;a gratuitement !</strong></li>
                </ul>
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
