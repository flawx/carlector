<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables

$NumLang = "";

include './initMC.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumMoCle = $_GET['id'];

	$queryText = 'SELECT * FROM motcle WHERE NumMoCle = :NumMoCle;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumMoCle' => $NumMoCle
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibMoCle = $object->LibMoCle;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle']))
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
			$NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumMoCle = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE motcle SET  LibMoCle = :LibMoCle, NumLang = :NumLang WHERE NumMoCle = :NumMoCle');

			$query->execute(
				array(
					':LibMoCle' => $LibMoCle,
					':NumLang' => $NumLang,
					':NumMoCle' => $NumMoCle
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadMC.php");


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

	<form method="POST" action="UpdMC.php">

			<input type="hidden" id="id" name="id" value="<?php echo $NumMoCle ?>">

			<div>
				<label>Libellé court</label>
				<input type="text" name="LibMoCle" id="LibMoCle" size="25" maxlength="25" value="<?= $LibMoCle?>">
			</div>

			 	    <!-- Listbox Pays -->
			<br><br>
			<label for="LibNumLang">
				<b>
					Quel langue :
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</b>
			</label>
			<input type="hidden" id="idNumLang" name="idNumLang" value="<?php echo $NumLang; ?>" />            
			<select size="1" name="NumLang" id="NumLang"  class="form-control form-control-create" tabindex="30" >
			<?php 
				// 2. Preparation requete NON PREPAREE
				// Récupération de l'occurrence	 pays à partir de l'id
				$queryText = 'SELECT * FROM LANGUE;';

				// 3. Lancement de la requete SQL
				$result = $bdPdo->query($queryText);

				// S'il y a bien un resultat
				if ($result) {
					// Parcours chaque ligne du resultat de requete
					// Récupération du résultat de requête
						while ($tuple = $result->fetch()) {
							$ListNumLang = $tuple["NumLang"];
							$ListLib1Lang = $tuple["Lib1Lang"];
			?>
                        <option value="<?= $ListNumLang; ?>" >
                            <?php echo $ListLib1Lang; ?>
                        </option>
			<?php 
								} // End of while
						}   // if ($result)
			?> 
        </select>
    <!-- FIN Listbox Pays -->

			<div>
				<input type="submit" name="Submit" value="Modifer">
			</div>
	</form>
	
</body>
</html>