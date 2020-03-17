<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';



	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';


            if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang']))
			AND ((isset($_POST['Lib2Lang'])) AND !empty($_POST['Lib2Lang']))
			AND ((isset($_POST['TypPays'])) AND !empty($_POST['TypPays']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Valider"))) {

				$erreur = false;

				$NumLang = 0;

				$Lib1Lang = (ctrlSaisies($_POST["Lib1Lang"]));
				$Lib2Lang = (ctrlSaisies($_POST["Lib2Lang"]));
				$numPays = (ctrlSaisies($_POST["TypPays"]));

				$numPaysSelect = $numPays;
				$parmNumLang = $numPaysSelect . '%';
				$requete = "SELECT MAX(NumLang) AS NumLang FROM LANGUE WHERE NumLang LIKE '$parmNumLang';";

				$numSeqLang = 0;

				$result = $bdPdo->query($requete);

				if ($result) {

					$tuple = $result->fetch();
					$NumLang = $tuple["NumLang"];
					if (is_null($NumLang)) {

						$NumLang = 0;
						$StrLang = $numPaysSelect;

					}	//Fin if (is_null($NumLang))
					
					else {

					$NumLang = $tuple["NumLang"];
					$StrLang = substr($NumLang, 0, 4);
					$numSeqLang = (int)substr($NumLang, 4);

					}	//Fin else

					$numSeqLang++;

					if ($numSeqLang < 10) {

						$NumLang = $StrLang . "0" . $numSeqLang;

					}	//Fin if ($numSeqLang < 10)
					else {

						$NumLang = $StrLang . $numSeqLang;

					}	//Fin else

				}	//Fin if ($result) 
				
				try {
					$bdPdo->beginTransaction();

					$query = $bdPdo->prepare('INSERT INTO LANGUE (NumLang, Lib1Lang, Lib2Lang, numPays) VALUES (:NumLang, :Lib1Lang, :Lib2Lang, :numPays);');

					$query->execute(
						array(
							':NumLang' => $NumLang,
							':Lib1Lang' => $Lib1Lang,
							':Lib2Lang' => $Lib2Lang,
							':numPays' => $numPays
						)
					);


					$bdPdo->commit();

					$query->closeCursor();

					header("Location:ReadLang.php");


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

	include './initLang.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>

	    <form class="formulaire" action="InsertLang.php" method="POST">

                <input type="hidden" id="id" name="id" value="">

                <label for="Lib1Lang">Libellé court :</label><br>
                <input type="text" name="Lib1Lang" id="Lib1Lang" size="25" placeholder="25 car. max" value=""><br>
                <label for="Lib2Lang">Libellé long :</label><br>
                <input type="text" name="Lib2Lang" id="Lib2Lang" size="45" placeholder="45 car. max" value=""><br>
				
				<br><br>
				<label for="LibTypPays">
					<b>
						Quel pays :
					</b>
				</label>
				<input type="hidden" id="idTypPays" name="idTypPays" value="" />            
				<select size="1" name="TypPays" id="TypPays"  class="form-control form-control-create" tabindex="30" >
				<?php 
					$numPays = "";
					$frPays = "";  

					$queryText = 'SELECT * FROM PAYS;';

					$result = $bdPdo->query($queryText);

					if ($result) {
					
							while ($tuple = $result->fetch()) {
								$ListnumPays = $tuple["numPays"];
								$ListfrPays = $tuple["frPays"];
				?>
									<option value="<?= $ListnumPays; ?>" >
										<?php echo $ListfrPays; ?>
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

