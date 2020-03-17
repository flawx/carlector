<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


			if (((isset($_POST['LibAngl'])) AND !empty($_POST['LibAngl']))
			AND((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumAngl = 0;

				$LibAngl = (ctrlSaisies($_POST["LibAngl"]));
				$numLang = (ctrlSaisies($_POST["TypLang"]));

				$LibLangSelect = substr($NumLang, 0, 4); 
				$parmNumLang = $LibLangSelect . '%';
		  
				$requete = "SELECT MAX(NumLang) AS NumLang FROM ANGLE WHERE NumLang LIKE '$parmNumLang';";
				$numSeq2Angl = 0;  

				$result = $bdPdo->query($requete);
		  
				if ($result) {
					$tuple = $result->fetch();
					$NumLang = $tuple["NumLang"];
					if (is_null($NumLang)) {    // New lang dans ANGLE //////////////////////
						$numSeq2Angl = 0;  
					}
					
					// No séquence suivant LANGUE
					$numSeq2Angl++;
					// No séquence ANGLE     ///////////////////////////////////////
					$numSeq1Angl = 0;
		  
					// No séquence ANGLE : Récup dernière PK utilisée
					$requete = "SELECT MAX(NumAngl) AS NumAngl FROM ANGLE;";
		  
					$result = $bdPdo->query($requete);
					$tuple = $result->fetch();
					$NumAngl = $tuple["NumAngl"];
		  
					$NumAnglSelect = (int)substr($NumAngl, 4, 2);
					$numSeq1Angl = $NumAnglSelect + 1;
		  
					$LibAnglSelect = "ANGL";
					// PK reconstituée : ANGL + no seq angle
					if ($numSeq1Angl < 10) {
						$NumAngl = $LibAnglSelect . "0" . $numSeq1Angl;
					}
					else {
						$NumAngl = $LibAnglSelect . $numSeq1Angl;
					}
					// PK reconstituée : ANGL + no seq angle + no seq langue
					if ($numSeq2Angl < 10) {
						$NumAngl = $NumAngl . "0" . $numSeq2Angl;
					}
					else {
						$NumAngl = $NumAngl . $numSeq2Angl;
					}
				}   // End of if ($result) / no seq angle
			  
				

					$query = $bdPdo->prepare('INSERT INTO ANGLE (NumAngl, LibAngl, numLang) VALUES (:NumAngl, :LibAngl, :numLang);');

					$query->execute(
						array(
							':NumAngl' => $NumAngl,
							':LibAngl' => $LibAngl,
							':numLang' => $numLang
						)
					);



					$query->closeCursor();

					header("Location:ReadAngl.php");

					
			}	//Fin if (((isset($_POST['Lib1Lang']))...
			else{

				$erreur = true;
				$errSaisies = "Erreur";
			}	
            

	}	//Fin if ($_SERVEUR["REQUEST_METHOD"] == "POST")

	include './initAngl.php';
	$TypLang = "";

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	    <form class="formulaire" action="InsertAngl.php" method="POST">

                <input type="hidden" id="id" name="id" value="">

                <label for="LibAngl">Libellé angle :</label><br>
                <input type="text" name="LibAngl" id="LibAngl" size="25" placeholder="25 car. max" value=""><br>
				
				<br><br>
				<label for="LibTypLang">
					<b>
						Quelle langue :
					</b>
				</label>
				<input type="hidden" id="idTypLang" name="idTypLang" value="" />            
				<select size="1" name="TypLang" id="TypLang"  class="form-control form-control-create" tabindex="30" >
				<?php 
					

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

