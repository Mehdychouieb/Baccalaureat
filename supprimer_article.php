<?php

//Connection Bdd
$link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");

if(isset($_GET['id_video'])&&!empty($_GET['id_video'])){

    $id_video = $_GET['id_video'];
}
$supprimer= "DELETE FROM articles WHERE id_video =$id_video";

if(mysqli_query($link,$supprimer)){

    $reponse= "ok c'est supprimé";
    echo $reponse;
}else{

    $reponse= "Erreur c'est pas supprimé";
    echo $reponse;
}
