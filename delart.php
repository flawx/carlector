<?php

include 'Article/initArt.php';

include 'Article/ConnectBD.php';
	
	$NumArt = $_GET['id'];
	$txt = "DELETE FROM ARTICLE WHERE NumArt=:NumArt";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumArt' => $NumArt
		)
	);
	header("Location:index.php");
?>