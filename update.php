
<?php 

include './verifText.php';

include './connection.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$Submit = isset($_POST['Submit']) ? $_POST['Submit'] : '';

		if ((isset($_POST['id'])) AND $_POST['id'] > 0) {

			$NumLang = $_POST['NumLang'];
			$Lib1Lang = $_POST['Lib1Lang'];
			$Lib2Lang = $_POST['Lib2Lang'];
			$NumPays = $_POST['numPays'];

			$txt2 = "UPDATE LANGUE SET Lib1Lang = :Lib1Lang, Lib2Lang = :Lib2Lang, NumPays = :numPays WHERE NumLang = :NumLang;";
			$query = $bdPdo->prepare($txt2);
			$query->execute(
				array(
					':NumLang' => $NumLang,
					':Lib1Lang' => $Lib1Lang,
					':Lib2Lang' => $Lib2Lang,
					':numPays' => $NumPays
				)
			);
		
		}
			
			header("Location:index.php");

	}	//Fin if ($_SERVEUR["REQUEST_METHOD"] == "POST")

	include './InitLangues.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
		<?php

			if (isset($_GET['id']) AND ($_GET['id'])) {

				$NumLang = $_GET['id'];
				$requete = "SELECT * FROM LANGUE WHERE NumLang = :NumLang;";
				$query = $conn->prepare($requete);

				$query->execute(
					array(
						':NumLang' => $NumLang
					)
				);

				if ($query AND $query->rowCount() == 1) {

					$object = $query->fetchObject();

					$Lib1Lang = $object->Lib1Lang;
					$Lib2Lang = $object->Lib2Lang;
					$NumPays = $object->NumPays;
				}

			}

		?>

	    <form class="formulaire" action="" method="POST">

                <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>">

                <label for="Lib1Lang">Libellé court :</label><br>
                <input type="text" name="Lib1Lang" id="Lib1Lang" size="25"  value="<?php if (isset($_GET['id'])) echo $Lib1Lang; ?>"><br>
                <label for="Lib2Lang">Libellé long :</label><br>
                <input type="text" name="Lib2Lang" id="Lib2Lang" size="45" value="<?php if (isset($_GET['id'])) echo $Lib2Lang; ?>" ><br>
                <label for="numPays">Quel pays :</label><br>
                <input type="text" name="NumPays" id="Numpays" size="8" value="<?php if (isset($_GET['id'])) echo $NumPays; ?>" ><br>
                <input type="submit" name="Submit" value="Valider">
        </form>
    </body>
</html>


