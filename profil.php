<?php
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
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
                if ($_SESSION['logged']) {
                    echo '<li><a href="brouillon.php"><span class="glyphicon glyphicon-cog"></span> Mes brouillons</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged']) {
                    echo '<li><a href="gestionusers.php"><span class="glyphicon glyphicon-cog"></span> Gestion des utilisateurs</a></li>';
                }
                ?>
                <?php
                if ($_SESSION['logged'] == false)
                    echo '<li><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
                ?>
                <?php
                if ($_SESSION['logged']) {
                    echo '<li class="active"><a href="profil.php"><span class="glyphicon glyphicon-user"></span> Mon profil</a></li>';
                }
                ?>
                <?php

                if ($_SESSION['logged']) {
                    echo '<li><a href = "deco.php" ><span class="glyphicon glyphicon-log-in" id="deco" ></span > Se deconnecter</a ></li>';
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

$tableHeading =array('id_user','nom',
    'prenom','email',
    'motDePasse','roles_id_role');
// Ajouter le champ supprimer dans l'entete du tableau
$tableHeading[]='supprimer';
$tableHeading[]='modifier';
?>
<?php
//On récupère tous les champs de la table users
$users = 'SELECT * FROM user WHERE id_user = '.$_SESSION["id_user"].'';
//send query
$reponse = mysqli_query($link, $users);


if(mysqli_num_rows($reponse)>0){//si il y a une reponse
while ($row = mysqli_fetch_assoc($reponse)) {

?>
<div class="container">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="panel panel-default" style="background-image: url(https://media.timeout.com/images/101566033/image.jpg)">
                <div class="panel-heading">
                    <h3 class="panel-title"><?= strtoupper($row["nom"]).' '.strtoupper($row['prenom']); ?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">

                                <div class="col-md-3 col-lg-3 " align="center">
                                    <img alt="User Pic" src="uploads/<?= $row['avatar']; ?>"
                                         class="img-squarre img-responsive">
                                    <form action="insertavatar.php" method="post" enctype="multipart/form-data">
                                        Selectionner une image a télécharger :
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <br>
                                        <input type="submit" value="Télécharger" name="submit">
                                    </form>
                                </div>
                        <div class=" col-md-12 col-lg-12 ">
                            <table class="table table-user-information" id="profiltable">
                                <tbody>
                              <?php  echo '<form action="modifier_user_profil.php" method="post">'; ?>
                                <tr id="profiltr">
                                    <td><span>Infos :</span></td>
                                </tr>
                              <br>
                                <tr class="<?php $row['id_user']; ?>">
                                <tr class="<?php $row['id_user']; ?>">
                                </tr>
                                <tr class="<?php $row['nom']; ?>">
                                    <td>Nom :</td>
                                    <td><?= $row['nom']; ?></td>
                                    <td><input class='modifier' type='hidden' name='nom'
                                               value="<?= $row['nom']; ?>"></td>
                                </tr>
                                <tr class="<?php $row['prenom']; ?>">
                                    <td>Penom :</td>
                                    <td><?= $row['prenom']; ?></td>
                                    <td><input  class='modifier'type='hidden' name='prenom'
                                                value="<?= $row['prenom']; ?>"></td>
                                </tr>
                                <tr class="<?php $row['email']; ?>">
                                    <td>Email :</td>
                                    <td><?= $row['email']; ?></td>
                                    <td><input  class='modifier'type='hidden' name='email'
                                                value="<?= $row['email']; ?>"></td>
                                </tr>
                                <tr class="<?php $row['motDePasse']; ?>">
                                    <td>Mot de Passe :</td>
                                    <td><?= $row['motDePasse']; ?></td>
                                    <td><input  class='modifier'type='hidden' name='motDePasse'
                                                value="<?= $row['motDePasse']; ?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><span>Actions :</span></td>
                                </tr>
                                <?php
                                echo'<tr>';
                                echo '<td>Delete</td>';
                                echo '<td>Modifier</td>';
                                echo '</tr>';
                                $champSupprimer = '<td><a class="supprimer" id="'.$row["id_user"].'"
                                    href="supprimer_user_profil.php?id_user='.$row["id_user"].'" onclick="removeUser('.$row["id_user"].')">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';

                                echo $champSupprimer;

                                $champModifier = ' <td><a  class="modifier" id="'.$row["id_user"].'" >
                                    <span class="glyphicon glyphicon-wrench" style="color:green;" aria-hidden="true"></span></a>
                                    <input type="submit" name="modifier" value="modifier"></td>';
                                echo $champModifier;

                                echo "</tr>";//ferme la ligne
                                echo '</form>';
                                ?>
                                </tbody>
                                <?php
                                }
                                }
                                ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).ready(function(){

        $(':submit[name=modifier]').hide();

        //click sur modifier
        var $elems = $(':input[name=modifier]');
        var $spans = $('.modifier');

        $spans.on('click',function()
        {
            var $elem = $(this);
            var $elem_class = $elem.attr('class');
            var $tr = $elem.parent().parent();
            var $tr_class = $tr.attr('class');

            $inputs = $tr.find(':hidden');
            $spans.each(function(){
                $(this).attr('type','text');

            });
            $inputs.last().show().attr('type','submit');


        });

    });
    //JQUERY
    $(document).ready(function(){
        $("div.panel-heading").click(function(){
            $("div.panel-body").animate({
                height: 'toggle'
            });
        });
    });
</script>

</body>
</html>