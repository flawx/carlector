<?php 

include './initUse.php';

include './ConnectBD.php';


	
	$NumUse = $_GET['id'];
	$txt = "DELETE FROM USER WHERE NumUse = :NumUse;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumUse' => $NumUse
		)
	);
	header("Location:ReadUse.php");
?>