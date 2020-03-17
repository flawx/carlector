<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


			if (((isset($_POST['LibMoCle'])) AND !empty($_POST['LibMoCle']))
			((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumMoCle = 0;

				$LibMoCle = (ctrlSaisies($_POST["LibMoCle"]));
				$NumLang = (ctrlSaisies($_POST["TypLang"]));

				 // Découpage FK LANGUE 
				 $LibLangSelect = substr($NumLang, 0, 4); 
				 $parmNumLang = $LibLangSelect . '%';
		   
				 $requete = "SELECT MAX(NumLang) AS NumLang FROM MOTCLE WHERE NumLang LIKE '$parmNumLang';";
				 $result = $bdPdo->query($requete);
		   
				 if ($result) {
					 $tuple = $result->fetch();
					 $NumLang = $tuple["NumLang"];
					 if (is_null($NumLang)) {    // New lang dans MOTCLE
						 // Récup dernière PK utilisée
						 $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE;";
						 $result = $bdPdo->query($requete);
						 $tuple = $result->fetch();
						 $NumMoCle = $tuple["NumMoCle"];
		   
						 $NumMoCleSelect = (int)substr($NumMoCle, 4, 2);
						 // No séquence suivant LANGUE
						 $numSeq1MoCle = $NumMoCleSelect + 1;
						 // Init no séquence MOTCLE pour nouvelle lang
						 $numSeq2MoCle = 1;
					 }
					 else {
						 // Récup dernière PK pour FK sélectionnée
						 $requete = "SELECT MAX(NumMoCle) AS NumMoCle FROM MOTCLE WHERE NumLang LIKE '$parmNumLang' ;";
						 $result = $bdPdo->query($requete);
						 $tuple = $result->fetch();
						 $NumMoCle = $tuple["NumMoCle"];
		   
						 // No séquence actuel LANGUE
						 $numSeq1MoCle = (int)substr($NumMoCle, 4, 2);
						 // No séquence actuel MOTCLE
						 $numSeq2MoCle = (int)substr($NumMoCle, 6, 2); 
						 // No séquence suivant MOTCLE
						 $numSeq2MoCle++;
					 }
		   
					 $LibMoCleSelect = "MTCL";
					 // PK reconstituée : MTCL + no seq langue
					 if ($numSeq1MoCle < 10) {
						 $NumMoCle = $LibMoCleSelect . "0" . $numSeq1MoCle;
					 }
					 else {
						 $NumMoCle = $LibMoCleSelect . $numSeq1MoCle;
					 }
					 // PK reconstituée : MOCL + no seq langue + no seq mot clé
					 if ($numSeq2MoCle < 10) {
						 $NumMoCle = $NumMoCle . "0" . $numSeq2MoCle;
					 }
					 else {
						 $NumMoCle = $NumMoCle . $numSeq2MoCle;
					 }
				 }   // End of if ($result) / no seq LANGUE 
				
				try {
					$bdPdo->beginTransaction();

					$query = $bdPdo->prepare('INSERT INTO motcle (NumMoCle, LibMoCle, numLang) VALUES (:NumMoCle, :LibMoCle, :numLang);');

					$query->execute(
						array(
							':NumMoCle' => $NumMoCle,
							':LibMoCle' => $LibMoCle,
							':numLang' => $numLang
						)
					);


					$bdPdo->commit();

					$query->closeCursor();

					header("Location:ReadMC.php");


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

	include './initMC.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	    <form class="formulaire" action="InsertMC.php" method="POST">

                <input type="hidden" id="id" name="id" value="">

                <label for="LibMoCle">LibMoCle :</label><br>
                <input type="text" name="LibMoCle" id="LibMoCle" size="25" placeholder="25 car. max" value=""><br>
                				
				<br><br>
				<label for="LibTypLang">
					<b>
						Quelle MC :
					</b>
				</label>
				<input type="hidden" id="idTypLang" name="idTypLang" value="" />            
				<select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" tabindex="30" >
				<?php 
					$NumLang = "";
					$Lib2Lang = "";  

					$queryText = 'SELECT * FROM LANGUE;';

					$result = $bdPdo->query($queryText);

					if ($result) {
					
							while ($tuple = $result->fetch()) {
								$ListNumLang = $tuple["NumLang"];
								$ListLib2Lang = $tuple["Lib2Lang"];
				?>
									<option value="<?= $ListNumLang; ?>" >
										<?php echo $ListLib2Lang; ?>
									</option>
				<?php 
							} 
					}  
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

