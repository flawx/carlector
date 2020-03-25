<?php 

include 'Article/ctrlSaisies.php';
include 'Article/ConnectBD.php';
include 'Article/initArt.php';

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
            $NumArt = $tuple["NumArt"];// No PK suivante ARTICLE
            $NumArt++;  
        }// End of if ($result)
        try {
            $bdPdo->beginTransaction();
            $query = $bdPdo->prepare('INSERT INTO ARTICLE (NumArt, DtCreA, LibTitrA, LibChapoA, LibAccrochA, Parag1A, LibSsTitr1, Parag2A, LibSsTitr2, Parag3A, LibClonclA, UrlPhotA, Likes, NumAngl, NumThem, NumLang) VALUES (:NumArt, :DtCreA, :LibTitrA, :LibChapoA, :LibAccrochA, :Parag1A, :LibSsTitr1, :Parag2A, :LibSsTitr2, :Parag3A, :LibClonclA, :UrlPhotA, :Likes, :NumAngl, :NumThem, :NumLang);');
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
        }//Fin try
        catch (PDOException $e) {
            die('Failed to insert Article : ' . $e->getMessage());
            $bdPdo->rollBack();
        }      
    }	//Fin if (((isset($_POST['Lib1Lang']))...
    else {
        $erreur = true;
        $errSaisies = "Erreur";
    }
}//Fin if ($_SERVEUR["REQUEST_METHOD"] == "POST")

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
    <h1 class="article-title"><b>Administration</b></h1>
    <?php
    if(!isset($_POST['username']) OR $_POST['username'] != "admin")
    {
        ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Nom d'utilisateur">
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="submit" name="login" value="Connexion">
        </form>
        <?php
    }
    else
    {
        if(!isset($_POST['password']) OR $_POST['password'] != "carlector")
        {
            ?>
            <form method="POST" action="">
                <input type="text" name="username" placeholder="Nom d'utilisateur">
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="submit" name="login" value="Connexion">
            </form>

            <?php
        }
        else
        {

            $reponse = $bdPdo->query('SELECT * FROM article');
            
            ?>
            <hr class="hr">
            <h3>Nouvel article :</h3>
            <form method="POST" action="">
                <input type="hidden" id="id" name="id" value="">
                Date : <input type="date" name="DtCreA" id="DtCreA" size="25" maxlength="25" placeholder="Date"><br>
                <input type="text" name="LibTitrA" id="LibTitrA" size="40" maxlength="40" placeholder="Titre">
                <input type="text" name="LibChapoA" id="LibChapoA" size="25" maxlength="25" placeholder="Chapo">
                <input type="text" name="LibAccrochA" id="LibAccrochA" size="40" maxlength="40" placeholder="Accroche"><br>
                <input type="text" name="Parag1A" id="Parag1A" size="40" maxlength="40" placeholder="Paragraphe 1">
                <input type="text" name="LibSsTitr1" id="LibSsTitr1" size="25" maxlength="25" placeholder="Sous-tire 1"><br>
                <input type="text" name="Parag2A" id="Parag2A" size="40" maxlength="40" placeholder="Paragraphe 2">
                <input type="text" name="LibSsTitr2" id="LibSsTitr2" size="25" maxlength="25" placeholder="Sous-titre 2"><br>
                <input type="text" name="Parag3A" id="Parag3A" size="40" maxlength="40" placeholder="Paragraphe 3">
                <input type="text" name="LibConclA" id="LibConclA" size="25" maxlength="25" placeholder="Conlusion"><br>
                <input type="url" name="UrlPhotA" id="UrlPhotA" size="40" maxlength="40" placeholder="URL Photo">
                <input type="hidden" name="Likes" id="Likes" size="25" maxlength="25" value="0">
                <br><br>
                <label for="LibNumAngl">
                    <b>Angle :</b>
                </label>
                <input type="hidden" id="idNumAngl" name="idNumAngl" value="">            
                <select size="1" name="NumAngl" id="NumAngl"  class="form-control form-control-create" tabindex="30">
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
                <input type="hidden" id="idNumThem" name="idNumThem" value="">            
                <select size="1" name="NumThem" id="NumThem"  class="form-control form-control-create" tabindex="30">
                    <?php
                    $queryText = 'SELECT * FROM thematique;';
                    $result = $bdPdo->query($queryText);
                    if ($result) {
                        while ($tuple = $result->fetch()) {
                            $ListNumThem = $tuple["NumThem"];
                            $ListLibThem = $tuple["LibThem"];
                        ?>
                        <option value="<?= $ListNumThem; ?>" ><?php echo $ListLibThem; ?></option>
                        <?php 
                        }
                    }
                    ?>
                </select>
                <br><br>
                <label for="LibNumLang">
                    <b>Langue :</b>
                </label>
                <input type="hidden" id="idNumLang" name="idNumLang" value="">            
                <select size="1" name="NumLang" id="NumLang"  class="form-control form-control-create" tabindex="30">
                    <?php
                    $queryText = 'SELECT * FROM langue;';
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
                <div>
                    <br>
                    <input type="submit" name="Submit" value="Valider">
                    <br>
                </div>
            </form>
            <hr class="hr">
            <h3>Tous les articles :</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Titre</th>
                    <th>Likes</th>

                    <th>NumLang</th>
                    <th>NumAngl</th>
                    <th>NumThem</th>

					<th>Suppr</th>
					<th>Modif</th>
                </tr>
                <?php

                while($tuple = $reponse->fetch())
                {

                ?>
                <tr>
                    <th><?php echo $tuple['NumArt'];?></th>
                    <th><?php echo $tuple['DtCreA'];?></th>
                    <th><?php echo $tuple['LibTitrA'];?></th>
                    <th><?php echo $tuple['Likes'];?></th>

                    <th><?php echo $tuple['NumLang'];?></th>
                    <th><?php echo $tuple['NumAngl'];?></th>
                    <th><?php echo $tuple['NumThem'];?></th>
                  
					<th><a href="delart.php?id=<?= $tuple["NumArt"] ?>">❌</a></th>
					<th><a href="updart.php?id=<?= $tuple["NumArt"] ?>">✏️</a></th>
                </tr>
                <?php
                
                }
                $reponse->closeCursor();

            }
        }
        ?>
</div>

</div>

</body>
</html>