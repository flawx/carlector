<?php

include 'Article/ctrlSaisies.php';
include 'Article/ConnectBD.php';


$NumAngl = "";
$NumThem = "";
$NumLang = "";

include './initArt.php';


if (isset($_GET['id']) AND  $_GET['id']) {

	$NumArt = $_GET['id'];

	$queryText = 'SELECT * FROM article WHERE NumArt = :NumArt;';
	$query = $bdPdo->prepare($queryText);
	$query->execute(
		array(
			':NumArt' => $NumArt
		)
	);

	//si il y a bien un résultat et qu'il ne comporte bien qu'une seule ligne
	if ($query AND $query->rowCount() == 1) {


		$object = $query->fetchObject();
		
		$DtCreA = $object->DtCreA;
		$LibTitrA = $object->LibTitrA;
		$LibChapoA = $object->LibChapoA;
		$LibAccrochA = $object->LibAccrochA;
		$Parag1A = $object->Parag1A;
		$LibSsTitr1 = $object->LibSsTitr1;
		$Parag2A = $object->Parag2A;
		$LibSsTitr2 = $object->LibSsTitr2;
		$Parag3A = $object->Parag3A;
		$LibConclA = $object->LibConclA;
		$UrlPhotA = $object->UrlPhotA;
		$Likes = $object->Likes;

		$NumAngl = $object->NumAngl;
		$NumThem = $object->NumThem;
		$NumLang = $object->NumLang;

	}

}


//Modifie les valeurs
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

	// SUBMIT, ternaire
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
			AND ((isset($_POST['LibConclA'])) AND !empty($_POST['LibConclA']))
			AND ((isset($_POST['UrlPhotA'])) AND !empty($_POST['UrlPhotA']))
			AND ((isset($_POST['Likes'])) AND !empty($_POST['Likes']))
			
			AND ((isset($_POST['NumAngl'])) AND !empty($_POST['NumAngl']))
			AND ((isset($_POST['NumThem'])) AND !empty($_POST['NumThem']))
			AND ((isset($_POST['NumLang'])) AND !empty($_POST['NumLang']))

			AND ((isset($_POST['id'])) AND !empty($_POST['id']))
			AND (!empty($_POST['Submit']) AND ($Submit == "Modifer"))) {

			$erreur = false;

			$DtCreA = (ctrlSaisies($_POST["DtCreA"]));
			$LibTitrA = (ctrlSaisies($_POST["LibTitrA"]));
			$LibChapoA = (ctrlSaisies($_POST["LibChapoA"]));
			$LibAccrochA = (ctrlSaisies($_POST["LibAccrochA"]));
			$Parag1A = (ctrlSaisies($_POST["Parag1A"]));
			$LibSsTitr1 = (ctrlSaisies($_POST["LibSsTitr1"]));
			$Parag2A = (ctrlSaisies($_POST["Parag2A"]));
			$LibSsTitr2 = (ctrlSaisies($_POST["LibSsTitr2"]));
			$Parag3A = (ctrlSaisies($_POST["Parag3A"]));
			$LibConclA = (ctrlSaisies($_POST["LibConclA"]));
			$UrlPhotA = (ctrlSaisies($_POST["UrlPhotA"]));
			$Likes = (ctrlSaisies($_POST["Likes"]));

			$NumAngl = (ctrlSaisies($_POST["NumAngl"]));
			$NumThem = (ctrlSaisies($_POST["NumThem"]));
			$NumLang = (ctrlSaisies($_POST["NumLang"]));

			$NumArt = ($_POST["id"]);

			$query = $bdPdo->prepare('UPDATE article SET DtCreA = :DtCreA,
			 LibTitrA = :LibTitrA, LibChapoA = :LibChapoA, LibAccrochA = :LibAccrochA,
			  Parag1A = :Parag1A, LibSsTitr1 = :LibSsTitr1, Parag2A = :Parag2A,
			   LibSsTitr2 = :LibSsTitr2, Parag3A = :Parag3A, LibConclA = :LibConclA,
				UrlPhotA = :UrlPhotA, Likes = :Likes, NumLang = :NumLang,
				 NumThem = :NumThem, NumAngl = :NumAngl WHERE NumArt = :NumArt');

			$query->execute(
				array(
					':DtCreA' => $DtCreA,
					':LibTitrA' => $LibTitrA,
					':LibChapoA' => $LibChapoA,
					':LibAccrochA' => $LibAccrochA,
					':Parag1A' => $Parag1A,
					':LibSsTitr1' => $LibSsTitr1,
					':Parag2A' => $Parag2A,
					':LibSsTitr2' => $LibSsTitr2,
					':Parag3A' => $Parag3A,
					':LibConclA' => $LibConclA,
					':UrlPhotA' => $UrlPhotA,
					':Likes' => $Likes,

					':NumLang' => $NumLang,
					':NumThem' => $NumThem,
					':NumAngl' => $NumAngl
				) //array
			); //$query->execute

			$query->closeCursor();

			header("Location:ReadArt.php");


		} //if (((isset($_POST['Lib1Lang'])) AND !empty($_POST['Lib1Lang'])) [...] AND (*Submit == "Valider")))
		else {

			$erreur = true;

		} //else
	

} //if ($_SERVER["REQUEST_METHOD"] == "POST")

?>
<!DOCTYPE html>
<html>
<title>Admin - Le Carlector Bordelais</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
<body class="w3-light-grey">

<header id="header" class="w3-container w3-center"> 
    <a class="logo" href="/blogart20/"><img src="Fichier 21.png"></a>
    <div class="nav-left w3-padding-32">
        <a class="nav" href="">Essais</a>
        <a class="nav" href="">Pratique</a>
    </div>
    <div class="nav-right w3-padding-32">
        <a class="nav" href="">Marques</a>
        <a class="nav" href="admin.php">Connexion</a>
    </div>
</header>

<div class="w3-row body">

<div class="article-header">
    <h1 class="article-title"><b>Edition</b></h1>
	<form method="POST" action="UpdArt.php">
		<input type="hidden" id="id" name="id" value="<?php echo $NumArt ?>">
		Date :<input type="text" name="DtCreA" id="DtCreA" value="<?= $DtCreA?>"><br>
		Titre :<input type="text" name="LibTitrA" id="LibTitrA" value="<?= $LibTitrA?>"><br>
		Chapo :<input type="text" name="LibChapoA" id="LibChapoA" value="<?= $LibChapoA?>"><br>
		Accroche :<input type="text" name="LibAccrochA" id="LibAccrochA" value="<?= $LibAccrochA?>"><br>
		Paragraphe 1 :<input type="text" name="Parag1A" id="Parag1A" value="<?= $Parag1A?>"><br>
		Sous-titre 1 :<input type="text" name="LibSsTitr1" id="LibSsTitr1" value="<?= $LibSsTitr1?>"><br>
		Paragraphe 2 :<input type="text" name="Parag2A" id="Parag2A" value="<?= $Parag2A?>"><br>
		Sous-titre 2 :<input type="text" name="LibSsTitr2" id="LibSsTitr2" value="<?= $LibSsTitr2?>"><br>
		Paragraphe 3 :<input type="text" name="Parag3A" id="Parag3A" value="<?= $Parag3A?>"><br>
		Conclusion :<input type="text" name="LibConclA" id="LibConclA" value="<?= $LibConclA?>"><br>
		URL Photo :<input type="text" name="UrlPhotA" id="UrlPhotA" value="<?= $UrlPhotA?>"><br>
		Likes <input type="text" name="Likes" id="Likes" value="<?= $Likes?>"><br>
		<br><br>
		<label for="LibNumAngl">
			<b>Angle :</b>
		</label>
		<input type="hidden" id="idNumAngl" name="idNumAngl" value="<?php echo $NumAngl; ?>">            
		<select size="1" name="NumAngl" id="NumAngl" class="form-control form-control-create" tabindex="30">
			<?php 
			$queryText = 'SELECT * FROM angle;';
			$result = $bdPdo->query($queryText);
			if ($result) {
				while ($tuple = $result->fetch()) {
					$ListNumAngl = $tuple["NumAngl"];
					$ListLibAngl = $tuple["LibAngl"];
				?>
				<option value="<?= $ListNumAngl; ?>"><?php echo $ListLibAngl; ?></option>
				<?php 
				}
			}
			?> 
		</select>
		<br><br>
		<label for="LibNumThem">
			<b>Thématique :</b>
		</label>
		<input type="hidden" id="idNumThem" name="idNumThem" value="<?php echo $NumThem; ?>">            
		<select size="1" name="NumThem" id="NumThem" class="form-control form-control-create" tabindex="30">
			<?php
			$queryText = 'SELECT * FROM thematique;';
			$result = $bdPdo->query($queryText);
			if ($result) {
				while ($tuple = $result->fetch()) {
					$ListNumThem = $tuple["NumThem"];
					$ListLibThem = $tuple["LibThem"];
				?>
				<option value="<?= $ListNumThem; ?>"><?php echo $ListLibThem; ?></option>
				<?php 
				}
			}
			?> 
		</select>
		<br><br>
		<label for="LibNumLang">
			<b>Langue :</b>
		</label>
		<input type="hidden" id="idNumLang" name="idNumLang" value="<?php echo $NumLang; ?>">            
		<select size="1" name="NumLang" id="NumLang"  class="form-control form-control-create" tabindex="30">
			<?php 
			$queryText = 'SELECT * FROM LANGUE;';
			$result = $bdPdo->query($queryText);
			if ($result) {
				while ($tuple = $result->fetch()) {
					$ListNumLang = $tuple["NumLang"];
					$ListLib1Lang = $tuple["Lib1Lang"];
				?>
				<option value="<?= $ListNumLang; ?>"><?php echo $ListLib1Lang; ?></option>
				<?php 
				}
			}
			?> 
		</select>
		<input type="submit" name="Submit" value="Modifer">
	</form>
</body>
</html>