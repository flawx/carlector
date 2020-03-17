<?php

include './ctrlSaisies.php';
include './ConnectBD.php';

//init les variables

$NumArt = "";

include './initCom.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumCom = $_GET['id'];

	$queryText = 'SELECT * FROM COMMENT WHERE NumCom = :NumCom;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumCom' => $NumCom
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		$DtCreC = $object->DtCreC;
		$PseudoAuteur = $object->PseudoAuteur;
		$LibCom = $object->LibCom;
		$NumArt = $object->NumArt;
	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
	$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if (((isset($_POST['DtCreC'])) AND !empty($_POST['DtCreC']))
			AND ((isset($_POST['PseudoAuteur'])) AND !empty($_POST['PseudoAuteur']))
			AND ((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
			
			AND ((isset($_POST['NumArt'])) AND !empty($_POST['NumArt']))
			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$DtCreC = (ctrlSaisies($_POST["DtCreC"]));
			$PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
			$LibCom = (ctrlSaisies($_POST["LibCom"]));
			$NumArt = (ctrlSaisies($_POST["NumArt"]));
			$NumCom = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE COMMENT SET DtCreC = :DtCreC, PseudoAuteur = :PseudoAuteur, LibCom = :LibCom, NumArt = :NumArt WHERE NumCom = :NumCom');

			$query->execute(
				array(
					':NumCom' => $NumCom,
					':DtCreC' => $DtCreC,
					':PseudoAuteur' => $PseudoAuteur,
					':LibCom' => $LibCom,
					':NumArt' => $NumArt,
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadCom.php");


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

	<form method="POST" action="UpdCom.php">

			<input type="hidden" id="id" name="id" value="<?php echo $NumCom ?>">

			<div>
				<label>Date Créa</label>
				<input type="text" name="DtCreC" id="DtCreC" size="25" maxlength="25" value="<?= $DtCreC?>">
			</div>

			<div>
				<label>Pseudo</label>
				<input type="text" name="PseudoAuteur" id="PseudoAuteur" size="40" maxlength="40" 
				value="<?= $PseudoAuteur?>">
			</div>

			<div>
				<label>Commentaires</label>
				<input type="text" name="LibCom" id="LibCom" size="40" maxlength="40" 
				value="<?= $LibCom?>">
			</div>

			    <!-- Listbox Pays -->
			<br><br>
			<label for="LibNumArt">
				<b>
					Quel article :
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</b>
			</label>
			<input type="hidden" id="idNumpArt" name="idNumArt" value="<?php echo $NumArt; ?>" />            
			<select size="1" name="NumArt" id="NumArt"  class="form-control form-control-create" tabindex="30" >
			<?php 
				// 2. Preparation requete NON PREPAREE
				// Récupération de l'occurrence	 pays à partir de l'id
				$queryText = 'SELECT * FROM article;';

				// 3. Lancement de la requete SQL
				$result = $bdPdo->query($queryText);

				// S'il y a bien un resultat
				if ($result) {
					// Parcours chaque ligne du resultat de requete
					// Récupération du résultat de requête
						while ($tuple = $result->fetch()) {
							$ListNumArt = $tuple["NumArt"];
							$ListLibTitrA = $tuple["LibTitrA"];
			?>
                        <option value="<?= $ListNumArt; ?>" >
                            <?php echo $ListLibTitrA; ?>
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