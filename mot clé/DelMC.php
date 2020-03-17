<?php 

include './initMC.php';

include './ConnectBD.php';


	
	$NumMoCle = $_GET['id'];
	$txt = "DELETE FROM MOTCLE WHERE NumMoCle=:NumMoCle;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumMoCle' => $NumMoCle
		)
	);
	header("Location:ReadMC.php");
?>