<?php
session_start();
include('config.php');

$per_page=2;

if (isset($_GET['page'])) {

    $page = $_GET['page'];

}

else {

    $page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

if (isset($_GET['act'])) {
    $categorie = ucfirst($_GET['act']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
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
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php">Nouveautés</a> </li>
                <li><a href="itw.php">Interviews</a> </li>
                <li><a href="concerts.php">Concerts</a> </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "editerarticle.php" ><span class="glyphicon glyphicon-pencil"></span> Editer un article </a ></li >';
                }
                ?>
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "mesarticles.php"  > <span class="glyphicon glyphicon-folder-open"></span> Mes articles </a ></li >';
                }
                ?>
                <?php
                if ($_SESSION['logged'] == false)
                    echo '<li><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
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
                if ($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Mon profil</a></li>';
                }
                ?>
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
<?php

$sql = 'SELECT * FROM articles WHERE id_video= '.$_GET["id_video"].' ';
$reponse = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($reponse)) {

    ?>
    <div class="container" >
        <div class="panel panel-default" style="background-image: url(https://images.genius.com/6ac9b80da9ffca39edd491e4a99b8c7c.1000x1000x1.jpg); border-radius: 50px;" >
            <div class="panel-heading" style="background-color: white;">
                <center><h4 style="margin-top: 30px;margin-bottom: 20px;"><?php echo $row['titre_video']; ?></h4></center>
            </div>
            <div class="panel-body">
                <center><iframe class="embed-responsive-item" width="600" height="400" src="https://www.youtube.com/embed/<?php echo $row['url_video']; ?>" frameborder="0" allowfullscreen style="margin-top:10px;" ></iframe></center>
                <div class="panel panel-default" style="background-color: whitesmoke; box-shadow: 1px 2px 2px; border-radius: 100px; margin-top: 10px;" >
                    <div class="panel-body">
                        <center><p style="font-style:bold; color:black">Publié le : <?php echo $row['date_video']; ?></p></center>
                        <center><p style="color:black;"><?php echo $row['desc_video']; ?></p></center>
                    </div>
                </div>
            </div>
        </div>
    </div>




<?php
}
?>






</body>
</html>