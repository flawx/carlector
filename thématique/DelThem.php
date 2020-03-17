<?php 

include './initThem.php';

include './ConnectBD.php';


	
	$NumThem = $_GET['id'];
	$txt = "DELETE FROM THEMATIQUE WHERE NumThem=:NumThem;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumThem' => $NumThem
		)
	);
	header("Location:ReadThem.php");
?>