<?php

$link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");

if(!empty($_POST['modifier']) && isset($_POST)){



    $id_user = (int) $_POST['id_user'] ;
    $nom = (string) $_POST['nom'] ;
    $prenom = (string) $_POST['prenom'] ;
    $email = (string) $_POST['email'] ;
    $motDePasse = (string) $_POST['motDePasse'];
    $role = (string) $_POST['role'];



    $sql= "UPDATE user SET  `nom` = '$nom', `prenom` = '$prenom', `email` = '$email', `motDePasse` = '$motDePasse',`role` = '$role' WHERE id_user  = $id_user";

    if(mysqli_query($link, $sql)){


    }

}
header('Location:profil.php');