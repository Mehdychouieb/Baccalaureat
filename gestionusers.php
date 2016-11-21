<?php
session_start();
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
    <title>Gestion des utilisateurs</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- ----- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/plugins/https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <li><a href="concerts.php">Concerts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if($_SESSION['logged'] && $_SESSION['role'] == "admin") {
                    echo '<li ><a href = "editerarticle.php"> <span class="glyphicon glyphicon-pencil"></span> Editer un article </a ></li >';
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
                if ($_SESSION['logged'] == false)
                    echo '<li><a href="ajoutUser.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>';
                ?>
                <?php
                if ($_SESSION['logged']) {
                    echo '<li class="active"><a href="gestionusers.php"><span class="glyphicon glyphicon-cog"></span> Gestion des utilisateurs</a></li>';
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
<!-- NAVBAR-->

<?php
//Connection Bdd
$link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");

// champs table
$tableHeading =array('id_user','nom',
    'prenom','email',
    'motDePasse','role');
// ajout 2 champs
$tableHeading[]='supprimer';
$tableHeading[]='modifier';

//debut container
echo "<div class='container-fluid'>";
echo "<div class='panel panel-default' style='background-image: url(http://www.rollingstone.fr/RS-WP-magazine/wp-content/uploads/2016/03/stromae.png)'>";
echo "<div class='panel-heading'> <h2 class='page-header text-center'>Gestion des utilisateurs</h2></div>
";
echo "<div class='panel-body'>";

echo "<table id='table' class='table table-bordered table-responsive'>";
//debut tableau head
echo "<thead><tr>";
//Ici on affiche les champs du tableau : entete
$i=0;
$tailleChamps = count($tableHeading);
//boucle sur le tableau qui contient les noms des champs
for( $i; $i < $tailleChamps; $i++)
{  ?>
    <!-- pour chaque champs afficher -->
    <th><?=$tableHeading[$i]?></th>
<?php }
echo "</tr></thead>";	//fin tableau head


//On récupère tous les champs de la table users
$users = "SELECT * FROM user order by id_user";
//send query
$reponse = mysqli_query($link, $users);

// PARTIE 2 (CE QUE CONTIENT LA BASE DE DONNEE)
echo "<tbody>";//tableau body debut

if(mysqli_num_rows($reponse)>0){//si il y a une reponse
    while($row = mysqli_fetch_assoc($reponse)){
        //debut formulaire
        echo '<form action="modifier_user.php" method="post">';

        echo "<tr class='".$row['id_user']."'>";//ouvre une ligne
        echo "<td class='".$row['id_user']."'>".$row['id_user']."<input type='hidden' name='id_user' value='".$row['id_user']."'></td>";
        echo "<td class='".$row['nom']."'>".$row['nom']."<input type='hidden' name='nom' value='".$row['nom']."'></td>";
        echo "<td class='".$row['prenom']."'>".$row['prenom']."<input type='hidden' name='prenom' value='".$row['prenom']."'></td>";
        echo "<td class='".$row['email']."'>".$row['email']."<input type='hidden' name='email' value='".$row['email']."'></td>";
        echo "<td class='".$row['motDePasse']."'>".$row['motDePasse']."<input type='hidden' name='motDePasse' value='".$row['motDePasse']."'></td>";
        echo "<td class='".$row['role']."'>".$row['role']."<input type='hidden' name='role' value='".$row['role']."'></td>";


        $champSupprimer = '<td><a class="supprimer" id="'.$row["id_user"].'" 
						href="javascript:void(0)" onclick="removeUser('.$row["id_user"].')">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';

        echo $champSupprimer;

        $champModifier = ' <td><a  class="modifier" id="'.$row["id_user"].'" >
						<span class="glyphicon glyphicon-wrench" style="color:green;" aria-hidden="true"></span></a>
						<input type="submit" name="modifier" value="modifier"></td>';
        echo $champModifier;

        echo "</tr>";//ferme la ligne
        echo '</form>';
    }
}
echo "</tbody>";//tableau body fin
echo "</table>";//FIN' DU TABLEAU
echo "</div>";
echo "</div>";
echo "</div>"; //Fin container
?>




</body>

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
            $inputs.each(function(){
                $(this).attr('type','text');

            });
            $inputs.last().show().attr('type','submit');


        });

    });
    //JQUERY

    var id_user=null;

    function removeUser( id_user ){
        $.ajax({
            url: 'supprimer_user.php',
            type: 'GET',
            data: 'id_user='+id_user,
            success: function(resultat){//si c'est ok
                $('#table').before(resultat);
            }
        })
    };

</script>
</html>