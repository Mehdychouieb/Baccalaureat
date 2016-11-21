<?php
include('config.php');

if (!empty($_POST) && isset($_POST['lienNom']) && isset($_POST['lienPrenom']) && isset($_POST['lienEmail']) && isset($_POST['lienMotDePasse'])) {
    $lienNom = $_POST['lienNom'];
    $lienPrenom = $_POST['lienPrenom'];
    $lienEmail = $_POST['lienEmail'];
    $lienMotDePasse = $_POST['lienMotDePasse'];


    $sql = "INSERT INTO `user`(`nom`, `prenom`, `email`, `motDePasse`, `role`) VALUES ('" . $lienNom . "','" . $lienPrenom . "','" . $lienEmail . "','" . $lienMotDePasse . "', 'membre')";

}


if (mysqli_query($link, $sql)) {
    header('Location: login.php');
}


mysqli_close($link);
?>
<!-- FONCTION QUI AJOUTE UN UTILISATEUR --><!-- FONCTION QUI AJOUTE UN UTILISATEUR --><!-- FONCTION QUI AJOUTE UN UTILISATEUR --><!-- FONCTION QUI AJOUTE UN UTILISATEUR -->
