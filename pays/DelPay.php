<?php 

include './initPay.php';

include './ConnectBD.php';


	
	$NumPays = $_GET['id'];
	$txt = "DELETE FROM PAYS WHERE NumPays=:NumPays;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumPays' => $NumPays
		)
	);
	header("Location:ReadPay.php");
?>