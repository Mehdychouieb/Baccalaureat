<?php


if(!empty($_POST['modifier']) && isset($_POST)){
    $id_user = (int) $_POST['id_user'] ;
    $nom = (string) $_POST['nom'] ;
    $prenom = (string) $_POST['prenom'] ;
    $email = (string) $_POST['email'] ;
    $motDePasse = (string) $_POST['motDePasse'] ;

    include('config.php');

    $sql= "UPDATE user SET  
    `id_user` = '$id_user',
	`nom` = '$nom',
	`prenom` = '$prenom',
	`email` = '$email',
	`motDePasse` = '$motDePasse'
	WHERE id_user  = $id_user";
    if(mysqli_query($link, $sql)){
        header("Location:profil.php?modifok");
    }
}