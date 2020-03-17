<?php 

include './initLang.php';

include './ConnectBD.php';


	
	$NumLang = $_GET['id'];
	$txt = "DELETE FROM LANGUE WHERE NumLang=:NumLang;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumLang' => $NumLang
		)
	);
	header("Location:ReadLang.php");
?>