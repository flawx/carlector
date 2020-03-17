<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables

$NumLang = "";

include './initAngl.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumAngl = $_GET['id'];

	$queryText = 'SELECT * FROM ANGLE WHERE NumAngl = :NumAngl;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumAngl' => $NumAngl
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibAngl = $object->LibAngl;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl']))
		
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$LibAngl = (ctrlSaisies($_POST["LibAngl"]));
			$NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumAngl = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE Angle SET LibAngl = :LibAngl, NumLang = :NumLang WHERE NumAngl = :NumAngl');

			$query->execute(
				array(
					':LibAngl' => $LibAngl,
					':NumLang' => $NumLang,
					':NumAngl' => $NumAngl
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadAngl.php");


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

	<form method="POST" action="UpdAngl.php">

			<input type="hidden" id="id" name="id" value="<?php echo $NumAngl ?>">

			<div>
				<label>Angle</label>
				<input type="text" name="LibAngl" id="LibAngl" size="25" maxlength="25" value="<?= $LibAngl?>">
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