<?php
session_start();
//Connection Bdd
$link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");


if(isset($_GET['id_user'])&&!empty($_GET['id_user'])) {

    $id_user = $_GET['id_user'];
}


$supprimer = 'DELETE FROM user WHERE id_user =  '.$_SESSION["id_user"].'';


if(mysqli_query($link,$supprimer)) {
    session_unset();
    session_destroy();
    header('Location:index.php?memberdelete');
}

else {
    $reponse= "Erreur c'est pas supprimé";
    echo $reponse;
}