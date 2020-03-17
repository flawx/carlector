<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


            if (((isset($_POST['DtCreA'])) AND !empty($_POST['DtCreA']))
			AND ((isset($_POST['LibTitrA'])) AND !empty($_POST['LibTitrA']))
			AND ((isset($_POST['LibChapoA'])) AND !empty($_POST['LibChapoA']))
			AND ((isset($_POST['LibAccrochA'])) AND !empty($_POST['LibAccrochA']))
			AND ((isset($_POST['Parag1A'])) AND !empty($_POST['Parag1A']))
			AND ((isset($_POST['LibSsTitr1'])) AND !empty($_POST['LibSsTitr1']))
			AND ((isset($_POST['Parag2A'])) AND !empty($_POST['Parag2A']))
			AND ((isset($_POST['LibSsTitr2'])) AND !empty($_POST['LibSsTitr2']))
			AND ((isset($_POST['Parag3A'])) AND !empty($_POST['Parag3A']))
			AND ((isset($_POST['LibClonclA'])) AND !empty($_POST['LibClonclA']))
			AND ((isset($_POST['UrlPhotA'])) AND !empty($_POST['UrlPhotA']))
			AND ((isset($_POST['Likes'])) AND !empty($_POST['Likes']))
			
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumArt = 0;

				$DtCreA = (ctrlSaisies($_POST["DtCreA"]));
				$LibTitrA = (ctrlSaisies($_POST["LibTitrA"]));
				$LibChapoA = (ctrlSaisies($_POST["LibChapoA"]));
				$LibAccrochA = (ctrlSaisies($_POST["LibAccrochA"]));
				$Parag1A = (ctrlSaisies($_POST["Parag1A"]));
				$LibSsTitr1 = (ctrlSaisies($_POST["LibSsTitr1"]));
				$Parag2A = (ctrlSaisies($_POST["Parag2A"]));
				$LibSsTitr2 = (ctrlSaisies($_POST["LibSsTitr2"]));
				$Parag3A = (ctrlSaisies($_POST["Parag3A"]));
				$LibClonclA = (ctrlSaisies($_POST["LibClonclA"]));
				$UrlPhotA = (ctrlSaisies($_POST["UrlPhotA"]));
				$Likes = (ctrlSaisies($_POST["Likes"]));

				$NumAngl = (ctrlSaisies($_POST["NumAngl"]));
				$NumThem = (ctrlSaisies($_POST["NumThem"]));
				$NumLang = (ctrlSaisies($_POST["NumLang"]));

				
				$requete = "SELECT MAX(NumArt) AS NumArt FROM ARTICLE;";
				$result = $bdPdo->query($requete);
		  
				if ($result) {
					$tuple = $result->fetch();
					$NumArt = $tuple["NumArt"];
					// No PK suivante ARTICLE
					$NumArt++;
		  
				}   // End of if ($result)
				
				try {
					$bdPdo->beginTransaction();

					$query = $bdPdo->prepare('INSERT INTO ARTICLE (NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, 
					LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibClonclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang)
					 VALUES (:NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A,  
					:LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibClonclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang);');

					$query->execute(
						array(
							':NumArt' => $NumArt,
							':DtCreA' => $DtCreA,
							':LibTitrA' => $LibTitrA,
							':LibChapoA' => $LibChapoA,
							':LibAccrochA' => $LibAccrochA,
							':Parag1A' => $Parag1A,
							':LibSsTitr1' => $LibSsTitr1,
							':Parag2A' => $Parag2A,
							':LibSsTitr2' => $LibSsTitr2,
							':Parag3A' => $Parag3A,
							':LibClonclA' => $LibClonclA,
							':UrlPhotA' => $UrlPhotA,
							':Likes' => $Likes,

							':NumLang' => $NumLang,
							':NumThem' => $NumThem,
							':NumAngl' => $NumAngl
						)
					);

					$artid = $NumArt;

					$bdPdo->commit();

					$query->closeCursor();

					header("Location:ReadArt.php");


				}	//Fin try
				catch (PDOException $e) {
					die('Failed to insert Article : ' . $e->getMessage());
					$bdPdo->rollBack();
				}
					
			}	//Fin if (((isset($_POST['Lib1Lang']))...
			else{

				$erreur = true;
				$errSaisies = "Erreur";
			}	
            

	}	//Fin if ($_SERVEUR["REQUEST_METHOD"] == "POST")

	include './initArt.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	<form method="POST" action="InsertArt.php">

			<input type="hidden" id="id" name="id" value="">

			<div>
				<label>DtCreA</label>
				<input type="text" name="DtCreA" id="DtCreA" size="25" maxlength="25" value="<?= $DtCreA?>">
			</div>

			<div>
				<label>LibTitrA </label>
				<input type="text" name="LibTitrA" id="LibTitrA" size="40" maxlength="40" 
				value="<?= $LibTitrA?>">
			</div>

			<div>
				<label>LibChapoA </label>
				<input type="text" name="LibChapoA" id="LibChapoA" size="25" maxlength="25" value="<?= $LibChapoA?>">
			</div>

			<div>
				<label>LibAccrochA </label>
				<input type="text" name="LibAccrochA" id="LibAccrochA" size="40" maxlength="40" 
				value="<?= $LibAccrochA?>">
			</div>

			<div>
				<label>Parag1A</label>
				<input type="text" name="Parag1A" id="Parag1A" size="40" maxlength="40" 
				value="<?= $Parag1A?>">
			</div>

			<div>
				<label>LibSsTitr1 </label>
				<input type="text" name="LibSsTitr1" id="LibSsTitr1" size="25" maxlength="25" value="<?= $LibSsTitr1?>">
			</div>

			<div>
				<label>Parag2A</label>
				<input type="text" name="Parag2A" id="Parag2A" size="40" maxlength="40" 
				value="<?= $Parag2A?>">
			</div>

			<div>
				<label>LibSsTitr2 </label>
				<input type="text" name="LibSsTitr2" id="LibSsTitr2" size="25" maxlength="25" value="<?= $LibSsTitr2?>">
			</div>

			<div>
				<label>Parag3A </label>
				<input type="text" name="Parag3A" id="Parag3A" size="40" maxlength="40" 
				value="<?= $Parag3A?>">
			</div>

			<div>
				<label>LibConclA </label>
				<input type="text" name="LibConclA" id="LibConclA" size="25" maxlength="25" value="<?= $LibConclA?>">
			</div>

			<div>
				<label>UrlPhotA </label>
				<input type="text" name="UrlPhotA" id="UrlPhotA" size="40" maxlength="40" 
				value="<?= $UrlPhotA?>">
			</div>

			<div>
				<label>Likes</label>
				<input type="text" name="Likes" id="Likes" size="25" maxlength="25" value="<?= $Likes?>">
			</div>

			<!-- Listbox Pays -->
			<br><br>
			<label for="LibNumAngl">
				<b>
					Quel pays :
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</b>
			</label>
			<input type="hidden" id="idNumAngl" name="idNumAngl" value="" />            
			<select size="1" name="NumAngl" id="NumAngl"  class="form-control form-control-create" tabindex="30" >
<?php 
			// 2. Preparation requete NON PREPAREE
			// Récupération de l'occurrence	 pays à partir de l'id
			$queryText = 'SELECT * FROM angle;';

			// 3. Lancement de la requete SQL
			$result = $bdPdo->query($queryText);

			// S'il y a bien un resultat
			if ($result) {
				// Parcours chaque ligne du resultat de requete
				// Récupération du résultat de requête
					while ($tuple = $result->fetch()) {
						$ListNumAngl = $tuple["NumAngl"];
						$ListLibAngl = $tuple["LibAngl"];
?>
					<option value="<?= $ListNumAngl; ?>" >
						<?php echo $ListLibAngl; ?>
					</option>
<?php 
					} // End of while
			}   // if ($result)
?> 
		</select>
		<!-- FIN Listbox Pays -->
		<!-- Listbox Pays -->
		<br><br>
		<label for="LibNumThem">
			<b>
				Quel langue :
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</b>
		</label>
		<input type="hidden" id="idNumThem" name="idNumThem" value="" />            
		<select size="1" name="NumThem" id="NumThem"  class="form-control form-control-create" tabindex="30" >
<?php 
			// 2. Preparation requete NON PREPAREE
			// Récupération de l'occurrence	 pays à partir de l'id
			$queryText = 'SELECT * FROM thematique;';

			// 3. Lancement de la requete SQL
			$result = $bdPdo->query($queryText);

			// S'il y a bien un resultat
			if ($result) {
				// Parcours chaque ligne du resultat de requete
				// Récupération du résultat de requête
					while ($tuple = $result->fetch()) {
						$ListNumThem = $tuple["NumThem"];
						$ListLibThem = $tuple["LibThem"];
?>
					<option value="<?= $ListNumThem; ?>" >
						<?php echo $ListLibThem; ?>
					</option>
<?php 
					} // End of while
			}   // if ($result)
?> 
		</select>
		<!-- FIN Listbox Pays -->
		<!-- Listbox Pays -->
		<br><br>
		<label for="LibNumLang">
			<b>
				Quel langue :
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</b>
		</label>
		<input type="hidden" id="idNumLang" name="idNumLang" value="" />            
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
				<input type="submit" name="Submit" value="Valider">
			</div>
		</form>

    </body>
</html>

