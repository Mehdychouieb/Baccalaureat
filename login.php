<?php
session_start();
include('config.php');

?>
<?php
// On démarre la session
//$loginOK = false;  // cf Astuce

// On n'effectue les traitement qu'à la condition que
// les informations aient été effectivement postées
if (isset($_POST) && (!empty($_POST['login'])) && (!empty($_POST['pass'])) ) {
            //$login =  $_POST['login'];
            //$pass = $_POST['pass'];

    // On va chercher le mot de passe afférent à ce login
    $sql = "SELECT * FROM user"; //"WHERE email = '.$login.' AND motDePasse = '.$pass.'";
    $req = mysqli_query($link,$sql) or die('Erreur SQL : <br/>'.$sql);

    // On vérifie que l'utilisateur existe bien
    if (mysqli_num_rows($req) > 0) {
        $data = mysqli_fetch_assoc($req);

        while($row = mysqli_fetch_assoc($req)){

        // On vérifie que son mot de passe est correct
        if ($_POST['pass'] == $row['motDePasse']) {
            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['motDePasse'] = $row['motDePasse'];
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            $_SESSION['role'] = $row['role'];

            header("Location:index.php?Connecté");
        }
        }
    }
    else{
        $_SESSION['logged'] = false;
         }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
    <nav role="navigation" class="navbar navbar-default" style="color:red;">
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
                    echo '<li ><a href = "editerarticle.php" > Editer un article </a ></li >';
                }
                ?>
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "mesarticles.php" > Mes articles </a ></li >';
                }
                ?>
                 <li><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
                <?php

                if ($_SESSION['logged']) {
                    echo '<li><a href = "deco.php" ><span class="glyphicon glyphicon-log-in" ></span > Se deconnecter</a ></li>';
                }
                else {
                    echo '<li class="active"><a href = "login.php" ><span class="glyphicon glyphicon-log-in" ></span > Connexion</a ></li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</div>

<!-- Trigger the modal with a button -->


<!-- Modal -->
<section>
    <div class="container" style="margin-top: 75px;">
        <div class="panel panel-default" style="background-image:url(http://culturebox.francetvinfo.fr/sites/default/files/assets/images/2015/09/stromae2015ok.jpg)" >
            <div class="panel-heading"><h2 class="page-header text-center">Connectez-vous !</h2></div>
            <div class="panel-body" >
                <form class="form-horizontal" role="form" method="post" action="login.php" id="formuLogin">
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="login" placeholder="exemple@domain.com" value="<?php //echo htmlspecialchars($_POST['email']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Mot de passe</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe" value="<?php //echo htmlspecialchars($_POST['nom']); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                            <input id="connection" name="connection" type="submit" value="Connexion" class="btn btn-danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>



<section>

<script>
   
</script>

    </body>
</html>


