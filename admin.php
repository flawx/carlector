<?php 

include 'Article/ctrlSaisies.php';
include 'Article/ConnectBD.php';
include 'Article/initArt.php';

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
                  
					<th><a href="DelArt.php?id=<?= $tuple["NumArt"] ?>">del</a></th>
					<th><a href="UpdArt.php?id=<?= $tuple["NumArt"] ?>">upd</a></th>
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