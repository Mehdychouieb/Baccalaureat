<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- ----- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="http://orig04.deviantart.net/74de/f/2012/155/d/1/4chan_logo_hq_by_michaudotcom-d529rdh.png" type="image/x-icon" />
</head>

<body>
<center><img src="assets/img/Stromae.png" style="width: 250px; height: 350px" class="image-responsive"></center>

<!-- --NAVBAR-- -->
<style type="text/css">
    .Navbar{
        margin: 10px;
    }
</style>
<div class="Navbar">
    <nav role="navigation" class="navbar navbar-default">
        <!-- Pour un affichage sur les mobiles -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">STROMAE</a>
        </div>
        <!-- Collection de liens de navigatioon -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Nouveautés</a> </li>
                <li><a href="itw.php">Interviews</a> </li>
                <li><a href="concerts.php">Concerts</a> </li>
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href = "editerarticle.php" > Mettre en ligne </a ></li >';
                }
                ?>
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href = "mesarticles.php" > Mes videos </a ></li>';
                }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="active" ><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
                <?php

                if ($_SESSION['logged']) {
                    echo '<li><a href = "deco.php" ><span class="glyphicon glyphicon-log-in" ></span > Se deconnecter</a ></li>';
                }
                else {
                    echo '<li><a href = "login.php" ><span class="glyphicon glyphicon-log-in" ></span > Connexion</a ></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>

<section>
    <div class="container" style="margin-top: 75px;">
<div class="panel panel-default" style="background-image: url(http://cdn3-elle.ladmedia.fr/var/plain_site/storage/images/loisirs/musique/news/stromae-face-au-cancer-dans-le-sombre-clip-de-quand-c-est-2985161/56224487-1-fre-FR/Stromae-face-au-cancer-dans-le-sombre-clip-de-Quand-c-est.png);">
    <div class="panel-heading"><h2 class="page-header text-center">Inscrivez vous !</h2></div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post" action="traitementAjoutUser.php" id="formuLogin">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lienNom" placeholder="Jackson" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="lienPrenom" placeholder="Michael" value="">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="lienEmail" placeholder="exemple@domain.com" value="<?php //echo htmlspecialchars($_POST['email']); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="lienMotDePasse" placeholder="MotDePasse" value="<?php //echo htmlspecialchars($_POST['nom']); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="ajouter" name="ajouter" type="submit" value="S'inscrire" class="btn btn-danger">
                </div>
            </div>
        </form>
    </div>
</div>
    </div>
</section>

</body>
</html>