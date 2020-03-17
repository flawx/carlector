<?php 

include './initCom.php';

include './ConnectBD.php';


	
	$NumCom = $_GET['id'];
	$txt = "DELETE FROM COMMENT WHERE NumCom=:NumCom;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumCom' => $NumCom
		)
	);
	header("Location:ReadCom.php");
?>