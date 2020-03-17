<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables

$NumLang = "";

include './initThem.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumThem = $_GET['id'];

	$queryText = 'SELECT * FROM thematique WHERE NumThem = :NumThem;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumThem' => $NumThem
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$LibThem = $object->LibThem;
		$NumLang = $object->NumLang;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
		
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$LibThem = (ctrlSaisies($_POST["LibThem"]));
			$NumLang = (ctrlSaisies($_POST["NumLang"]));
			$NumThem = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE thematique SET LibThem = :LibThem, NumLang = :NumLang WHERE NumThem = :NumThem');

			$query->execute(
				array(
					':LibThem' => $LibThem,
					':NumLang' => $NumLang,
					':NumThem' => $NumThem
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadThem.php");


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

	<form method="POST" action="UpdThem.php">

			<input type="hidden" id="id" name="id" value="<?php echo $NumThem ?>">

			<div>
				<label>thematique</label>
				<input type="text" name="LibThem" id="LibThem" size="25" maxlength="25" value="<?= $LibThem?>">
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