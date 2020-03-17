<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


            if (((isset($_POST['DtCreC'])) AND !empty($_POST['DtCreC']))
			AND ((isset($_POST['PseudoAuteur'])) AND !empty($_POST['PseudoAuteur']))
			AND ((isset($_POST['LibCom'])) AND !empty($_POST['LibCom']))
			AND((isset($_POST['TypArt'])) AND !empty($_POST['TypArt']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumCom = 0;

				$DtCreC = (ctrlSaisies($_POST["DtCreC"]));
				$PseudoAuteur = (ctrlSaisies($_POST["PseudoAuteur"]));
				$LibCom = (ctrlSaisies($_POST["LibCom"]));
				$numArt = (ctrlSaisies($_POST["TypArt"]));

				$requete = "SELECT MAX(NumArt) AS NumArt FROM COMMENT;";
				$result = $bdPdo->query($requete);
		  
				if ($result) {
					$tuple = $result->fetch();
					$NumArt = $tuple["NumCom"];
					// No PK suivante COMMENT
					$NumArt++;
		  
					//clé primaire reconstituée
					if ($NumArt < 10) {
						$NumArt = "00" . $NumArt;
					}
					else {
						$NumArt = "0" . $NumArt;
					}
				}   // End of if ($result) 
				
				try {
					$bdPdo->beginTransaction();

					$query = $bdPdo->prepare('INSERT INTO COMMENT (NumCom, DtCreC, PseudoAuteur, LibCom, NumArt) VALUES (:NumCom, :DtCreC, :PseudoAuteur, :LibCom, :NumArt);');

					$query->execute(
						array(
							':NumCom' => $NumCom,
							':DtCreC' => $DtCreC,
							':PseudoAuteur' => $PseudoAuteur,
							':LibCom' => $LibCom,
							':NumArt' => $NumArt
						)
					);

					$comid = $NumCom;

					$bdPdo->commit();

					$query->closeCursor();

					header("Location:ReadCom.php");


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

	include './initCom.php';
	$TypArt = "";
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	    <form class="formulaire" action="InsertCom.php" method="POST">

                <input type="hidden" id="id" name="id" value="">

                <label for="Lib1Lang">date crea :</label><br>
                <input type="text" name="DtCreC" id="DtCreC" size="25" placeholder="25 car. max" value=""><br>
                <label for="Lib2Lang">pseudo :</label><br>
                <input type="text" name="PseudoAuteur" id="PseudoAuteur" size="45" placeholder="45 car. max" value=""><br>
				<label for="Lib2Lang">comment :</label><br>
                <input type="text" name="LibCom" id="LibCom" size="45" placeholder="45 car. max" value=""><br>
				
				<br><br>
				<label for="LibTypArt">
					<b>
						Quel article :
					</b>
				</label>
				<input type="hidden" id="idTypArt" name="idTypArtt" value="" />            
			<select size="1" name="TypArt" id="NumTypArtArt"  class="form-control form-control-create" tabindex="30" >
			<?php 
				$NumArt = "";
				$LibTitrA = "";

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
	
					<br>
				<div class="control-group">
					<div class="controls">
						<input type="submit" name="Submit" value="Valider" class="btn btn-primary" />
					</div>
				</div>

        </form>

    </body>
</html>

