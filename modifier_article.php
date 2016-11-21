<?php
if(!empty($_POST['modifier']) && isset($_POST)) {
    
    $id_video = (int) $_POST['id_video'] ;
    $url_video = (string) $_POST['url_video'] ;
    $titre_video = (string) $_POST['titre_video'] ;
    $desc_video = (string) $_POST['desc_video'] ;
    $date_video = (string) $_POST['date_video'] ;
    $publier =  $_POST['publier'];

    $link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");


    $sql= "UPDATE articles SET  `id_video` = '$id_video', `url_video` = '$url_video',  `titre_video` = '$titre_video', `desc_video` = '$desc_video', `date_video` = '$date_video',`publier` = '$publier' WHERE `id_video`  = $id_video";

    if(mysqli_query($link, $sql)){
        header("Location:mesarticles.php?modif=ok");
    }
    else {
        echo 'pas ok';
    }
}






