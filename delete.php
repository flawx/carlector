<?php 

include './InitLangues.php';

include './connection.php';


	
	$NumLang = $_GET['id'];
	$txt = "DELETE FROM LANGUE WHERE NumLang=:NumLang;";
	$query = $conn->prepare($txt);
	$query->execute(

		array(
		':NumLang' => $NumLang
		)
	);
	header("Location:select.php");
?>