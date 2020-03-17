<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


			if (((isset($_POST['LibThem'])) AND !empty($_POST['LibThem']))
			AND ((isset($_POST['TypLang'])) AND !empty($_POST['TypLang']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumThem = 0;

				$LibThem = (ctrlSaisies($_POST["LibThem"]));
				$numLang = (ctrlSaisies($_POST["TypLang"]));

				 // Découpage FK LANGUE 
				 $LibLangSelect = substr($NumLang, 0, 4); 
				 $parmNumLang = $LibLangSelect . '%';
		   
				 $requete = "SELECT MAX(NumLang) AS NumLang FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang';";
				 $result = $bdPdo->query($requete);
		   
				 if ($result) {
					 $tuple = $result->fetch();
					 $NumLang = $tuple["NumLang"];
					 if (is_null($NumLang)) {    // New lang dans THEMATIQUE
						 // Récup dernière PK utilisée
						 $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE;";
						 $result = $bdPdo->query($requete);
						 $tuple = $result->fetch();
						 $NumThem = $tuple["NumThem"];
		   
						 $NumThemSelect = (int)substr($NumThem, 3, 2);
						 // No séquence suivant LANGUE
						 $numSeq1Them = $NumThemSelect + 1;
						 // Init no séquence THEMATIQUE pour nouvelle lang
						 $numSeq2Them = 1;
					 }
					 else {
						 // Récup dernière PK pour FK sélectionnée
						 $requete = "SELECT MAX(NumThem) AS NumThem FROM THEMATIQUE WHERE NumLang LIKE '$parmNumLang' ;";
						 $result = $bdPdo->query($requete);
						 $tuple = $result->fetch();
						 $NumThem = $tuple["NumThem"];
		   
						 // No séquence actuel LANGUE
						 $numSeq1Them = (int)substr($NumThem, 3, 2);
						 // No séquence actuel THEMATIQUE
						 $numSeq2Them = (int)substr($NumThem, 5, 2); 
						 // No séquence suivant THEMATIQUE
						 $numSeq2Them++;
					 }
		   
					 $LibThemSelect = "THE";
					 // PK reconstituée : THE + no seq langue
					 if ($numSeq1Them < 10) {
						 $NumThem = $LibThemSelect . "0" . $numSeq1Them;
					 }
					 else {
						 $NumThem = $LibThemSelect . $numSeq1Them;
					 }
					 // PK reconstituée : THE + no seq langue + no seq thématique
					 if ($numSeq2Them < 10) {
						 $NumThem = $NumThem . "0" . $numSeq2Them;
					 }
					 else {
						 $NumThem = $NumThem . $numSeq2Them;
					 }
				 }   // End of if ($result) / no seq LANGUE
				
				try {
					$bdPdo->beginTransaction();

					$query = $bdPdo->prepare('INSERT INTO thematique (NumThem, LibThem, numLang) VALUES (:NumThem, :LibThem, :numLang);');

					$query->execute(
						array(
							':NumThem' => $NumThem,
							':LibThem' => $LibThem,
							':numLang' => $numLang
						)
					);

					$themid = $NumThem;

					$bdPdo->commit();

					$query->closeCursor();

					header("Location:ReadThem.php");


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

	include './initThem.php';
	$TypLang = "";

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	    <form class="formulaire" action="InsertThem.php" method="POST">

                <input type="hidden" id="id" name="id" value="">

                <label for="LibThem">thematique :</label><br>
                <input type="text" name="LibThem" id="LibThem" size="25" placeholder="25 car. max" value=""><br>
               
				<br><br>
				<label for="LibTypLang">
					<b>
						Quelle langue :
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

