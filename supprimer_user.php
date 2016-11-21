<?php
	
	//Connection Bdd
$link = mysqli_connect("91.134.133.249", "MedhyC", "tableau-241", "Bac");
	
	if(isset($_GET['id_user'])&&!empty($_GET['id_user'])){
		
		$id_user = $_GET['id_user'];
	}
	$supprimer= "DELETE FROM user WHERE id_user =$id_user";
	
	if(mysqli_query($link,$supprimer)){
		echo  "<p>Le compte a bien été supprimé</p><br>";
	}
	?>