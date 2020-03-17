<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables

$NumPays = "";

include './initLang.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumLang = $_GET['id'];

	$queryText = 'SELECT * FROM LANGUE WHERE NumLang = :NumLang;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumLang' => $NumLang
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$Lib1Lang = $object->Lib1Lang;
		$Lib2Lang = $object->Lib2Lang;
		$NumPays = $object->NumPays;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
			AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
			AND ((isset($_POST['TypPays'])) AND !empty($_POST['TypPays']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
			$Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
			$NumPays = (ctrlSaisies($_POST["TypPays"]));
			$NumLang = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE langue SET Lib1Lang = :Lib1Lang, Lib2Lang = :Lib2Lang, NumPays = :NumPays WHERE NumLang = :NumLang');

			$query->execute(
				array(
					':Lib1Lang' => $Lib1Lang,
					':Lib2Lang' => $Lib2Lang,
					':NumPays' => $NumPays,
					':NumLang' => $NumLang
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadLang.php");


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

	<form method="POST" action="UpdLang.php">

			<input type="hidden" id="id" name="id" value="<?php echo $NumLang ?>">

			<div>
				<label>Libellé court</label>
				<input type="text" name="Lib1Lang" id="Lib1Lang" size="25" maxlength="25" value="<?= $Lib1Lang?>">
			</div>

			<div>
				<label>Libellé long</label>
				<input type="text" name="Lib2Lang" id="Lib2Lang" size="40" maxlength="40" 
				value="<?= $Lib2Lang?>">
			</div>

			    <!-- Listbox Pays -->
			<br><br>
			<label for="LibTypPays">
				<b>
					Quel pays :
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</b>
			</label>
			<input type="hidden" id="idTypPays" name="idTypPays" value="<?php echo $NumPays; ?>" />            
			<select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
			<?php 
				// 2. Preparation requete NON PREPAREE
				// Récupération de l'occurrence	 pays à partir de l'id
				$queryText = 'SELECT * FROM PAYS;';

				// 3. Lancement de la requete SQL
				$result = $bdPdo->query($queryText);

				// S'il y a bien un resultat
				if ($result) {
					// Parcours chaque ligne du resultat de requete
					// Récupération du résultat de requête
						while ($tuple = $result->fetch()) {
							$ListnumPays = $tuple["numPays"];
							$ListfrPays = $tuple["frPays"];
			?>
                        <option value="<?= $ListnumPays; ?>" >
                            <?php echo $ListfrPays; ?>
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