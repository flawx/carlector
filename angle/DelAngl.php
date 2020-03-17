<?php 

include './initAngl.php';

include './ConnectBD.php';


	
	$NumAngl = $_GET['id'];
	$txt = "DELETE FROM ANGLE WHERE NumAngl=:NumAngl;";
	$query = $bdPdo->prepare($txt);
	$query->execute(

		array(
		':NumAngl' => $NumAngl
		)
	);
	header("Location:ReadAngl.php");
?>