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
    <title>Mes Brouillons</title>
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "editerarticle.php" ><span class="glyphicon glyphicon-pencil"></span>  Editer un article </a ></li >';
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
                if ($_SESSION['logged']) {
                    echo '<li  class="active"><a href="brouillon.php"><span class="glyphicon glyphicon-cog"></span> Mes brouillons</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged']) {
                    echo '<li><a href="gestionusers.php"><span class="glyphicon glyphicon-cog"></span> Gestion des utilisateurs</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged']) {
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
<div>
</div>
<!-- --NAVBAR-- -->

<br>
<br>


<?php
//RECUPERE videos + categories
$TableVideos = "SELECT * FROM articles LEFT JOIN categories ON articles.categorie_video = categories.id_categorie WHERE  publier = 'non'";
//SI IL Y A UNE CATEGORIE
if(isset($categorie)){
    $TableVideos.= " WHERE categories.nom_categorie = '$categorie' ";
}

$TableVideos.=" ORDER BY id_video DESC LIMIT $start_from, $per_page";

$reponse = mysqli_query($link,  $TableVideos);
while($row = mysqli_fetch_assoc($reponse)){

    ?>
    <?php

    ?>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h4 style="margin-top: 10px;margin-bottom: 20px;"><?php echo $row['titre_video']; ?></h4></center>
            </div>
            <div class="panel-body">
                <center><a href="detailarticle.php?id_video=<?php echo $row['id_video']; ?>"> <img class="vignette image-responsive" src="vignette/<?= $row['vignette']; ?>"></a></center>
            </div>
        </div>
    </div>
            <div class="col-md-12">
                <form action="brouillon.php" method="post">
                   <center><input type="submit" value="Publier"></center>
                </form>

            </div>
    <?php
}
?>
<?php

    $sql= "UPDATE articles SET publier = 'oui'";

    if(mysqli_query($link, $sql)){


    }
    else {
        echo "sa ne marche pas";
    }

?>
<div>
    <?php

    //Now select all from table
    $requete = "SELECT * FROM articles LEFT JOIN categories ON articles.categorie_video = categories.id_categorie WHERE publier='non'";
    $exec = mysqli_query($link,  $requete);

    // Count the total records
    $total_records = mysqli_num_rows($exec);

    //Using ceil function to divide the total records on per page
    $total_pages = ceil($total_records / $per_page);

    //Going to first page
    echo '<center><ul class="pagination" style="margin-bottom: 140px;"><li><span><a href="brouillon.php?page=1">Premiere Page</a></span></li>';

    for ($i=1; $i<=$total_pages; $i++) {

        echo "<li><span><a href=brouillon.php?page=$i>".$i."</a></span></li>";
    };
    // Going to last page
    echo "<li><span><a href=brouillon.php?page=$total_pages>Derniere Page</a></span></li></center>";
    ?>
</div>


</body>
</html>