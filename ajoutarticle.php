<?php

include('config.php');


if (!empty($_POST) && isset($_POST['lienUrl']) && isset($_POST['lienTitre'])/** && isset($_POST['lienDate'])**/ && isset($_POST['description'])) {
    $lienUrl = htmlspecialchars($_POST['lienUrl']);
    $lienVignette = htmlspecialchars($_POST['lienVignette']);
    $lienTitre = htmlspecialchars($_POST['lienTitre']);
    $description = htmlspecialchars($_POST['description']);
    $publier = ($_POST['publier']);


    foreach ($_POST['categorie'] as $valeur) {
        $req = 'INSERT INTO `articles`(`url_video`,`vignette`,`titre_video`, `date_video`, `desc_video`, `categorie_video`, `publier`) VALUES ("' . $lienUrl . '","' . $lienVignette . '","' . $lienTitre . '",  NOW()  ,"' . $description . '","' . $valeur . ' ","' . $publier . '")';

    }
    if (!$_POST['categorie']) {
        echo "Aucune checkbox n'a été cochée";
    }
    
    
}

if (mysqli_query($link, $req)) {
    header("Location:mesarticles.php");
}


mysqli_close($link);


