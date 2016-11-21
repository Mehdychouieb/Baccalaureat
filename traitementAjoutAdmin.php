<!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN -->
<?php

include('config.php');

if (!empty($_POST) && isset($_POST['lienNom']) && isset($_POST['lienPrenom']) && isset($_POST['lienEmail']) && isset($_POST['lienMotDePasse'])) {
    $lienNom = $_POST['lienNom'];
    $lienPrenom = $_POST['lienPrenom'];
    $lienEmail = $_POST['lienEmail'];
    $lienMotDePasse = $_POST['lienMotDePasse'];


    $sql = "INSERT INTO `user`(`nom`, `prenom`, `email`, `motDePasse`, `role`) VALUES ('" . $lienNom . "','" . $lienPrenom . "','" . $lienEmail . "','" . $lienMotDePasse . "', 'admin')";

}


if (mysqli_query($link, $sql)) {
    echo '<center><p class=\'text-danger\'>Ajout effectué :)</p></center>';
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
header('Location: index.php');

mysqli_close($link);



?>
<!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN --><!-- FONCTION QUI AJOUTE UN ADMIN -->