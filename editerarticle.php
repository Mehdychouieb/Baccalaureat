<?php
session_start();
include('config.php');
if ($_SESSION['logged']) {

}
else {
    header('Location:index.php?notconnected');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Editer un article</title>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li class="active" ><a href = "editerarticle.php" ><span class="glyphicon glyphicon-pencil"></span> Editer un article </a ></li >';
                }
                ?>
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "mesarticles.php"  > <span class="glyphicon glyphicon-folder-open"></span> Mes articles </a ></li >';
                }
                ?>
                <?php
                if ($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href="brouillon.php"><span class="glyphicon glyphicon-cog"></span> Mes brouillons</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href="gestionusers.php"><span class="glyphicon glyphicon-cog"></span> Gestion des utilisateurs</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged'] == false)
                    echo '<li><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
                ?>
                <?php
                if ($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Mon profil</a></li>';
                }
                ?>
                <?php


                if ($_SESSION['logged']) {
                    echo '<li><a href = "deco.php" ><span class="glyphicon glyphicon-log-in" id="deco"></span > Se deconnecter</a ></li>';
                }
                else {
                    echo '<li><a href = "login.php" ><span class="glyphicon glyphicon-log-in" ></span > Connexion</a ></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
<div class="panel panel-default" style="background-image: url(http://conakryplanete.info/wp-content/uploads/2015/08/stromae.jpg)">
    <div class="panel-heading">
        <h1 style="text-align: center; font-family: 'QUARTZO demo';">Editer un article</h1>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post" action="ajoutarticle.php">
            <div class="form-group">
                <label class="col-sm-2 control-label">TITRE</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="lienTitre" placeholder="Entrez le titre de la video" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">URL</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="lienUrl" placeholder="http://exemple.webm" value="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Vignette</label>
                <div class="col-md-4">
                    <input type="file" class="form-control" name="lienVignette">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">DESCRIPTION</label>
                <div class="col-sm-6">
                    <textarea class="form-control" rows="4" name="description" placeholder="Description de la video"></textarea>
                </div>
            </div>
            <div class="col-md-6 col-md-offset-2">
                <?php
                $sql= "SELECT * FROM categories";
                $req = $link->query($sql);
                // on envoie la requête
                while ($row = mysqli_fetch_object($req)) {
                    ?>
                    <label class="btn btn-warning">
                        <input type="radio" name="categorie[]" value="<?= $row->id_categorie;?>"> <?= $row->nom_categorie;?>
                    </label>
                    <?php
                }
                ?>
                <hr>
                <label class="btn btn-danger checked">
                 <input type="radio" name="publier" value="oui"> Publier
                </label>
                <label class="btn btn-danger checked">
                    <input type="radio" name="publier" value="non"> Enregistrer en brouillon
                </label>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                   <center><input name="envoyer" type="submit" value="Ajouter une video" class="btn btn-success" style="margin-top:20px;"></center>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<br>
<br>
<br>




</body>
</html>
