<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables


include './initUse.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$Login = $_GET['id'];

	$queryText = 'SELECT * FROM user WHERE Login = :Login;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':Login' => $Login
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$Login = $object->Login;
		$Pass = $object->Pass;
		$LastName = $object->LastName;
		$FirstName = $object->FirstName;
		$EMail = $object->EMail;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['Login'])) AND !empty($_POST['Login']))
			AND ((isset($_POST['Pass'])) AND !empty($_POST['Pass']))
			AND ((isset($_POST['LastName'])) AND !empty($_POST['LastName']))
			AND ((isset($_POST['FirstName'])) AND !empty($_POST['FirstName']))
			AND ((isset($_POST['EMail'])) AND !empty($_POST['EMail']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$Login = (ctrlSaisies($_POST["Login"]));
			$Pass = (ctrlSaisies($_POST["Pass"]));
			$LastName = (ctrlSaisies($_POST["LastName"]));
			$FirstName = (ctrlSaisies($_POST["FirstName"]));
			$EMail = (ctrlSaisies($_POST["EMail"]));
			$Login = ($_POST["id"]);

			$query = $bdPdo->prepare("UPDATE user SET 'Login = :Login', Pass = :Pass, LastName = :LastName, FirstName = :FirstName, EMail = :EMail WHERE 'Login = :Login'");

			$query->execute(
				array(
					':Login' => $Login,
					':Pass' => $Pass,
					':LastName' => $LastName,
					':FirstName' => $FirstName,
					':EMail' => $EMail,
					':Login' => $Login
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadUse.php");


		} //if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <title>BlogArt</title>
</head>



<body>
	<h2> Edit </h2>

	<form method="POST" action="UpdUse.php">

			<input type="hidden" id="id" name="id" value="<?php echo $Login ?>">

			<div>
				<label>Login</label>
				<input type="text" name="Login" id="Login" size="25" maxlength="25" value="<?= $Login?>">
			</div>

			<div>
				<label>Pass</label>
				<input type="text" name="Pass" id="Pass" size="40" maxlength="40" 
				value="<?= $Pass?>">
			</div>

			<div>
				<label>LastName</label>
				<input type="text" name="LastName" id="LastName" size="25" maxlength="25" value="<?= $LastName?>">
			</div>

			<div>
				<label>FirstName</label>
				<input type="text" name="FirstName" id="FirstName" size="40" maxlength="40" 
				value="<?= $FirstName?>">
			</div>
			
			<div>
				<label>EMail</label>
				<input type="text" name="EMail" id="EMail" size="25" maxlength="25" value="<?= $EMail?>">
			</div>


			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>
	
</body>
</html>