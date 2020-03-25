<?php

include './initArt.php';

include './ConnectBD.php';
	
	$NumArt = $_GET['id'];
	$txt = "DELETE FROM ARTICLE WHERE NumArt=:NumArt";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumArt' => $NumArt
		)
	);
	header("Location:ReadArt.php");
?>