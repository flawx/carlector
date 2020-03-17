<?php 

include './initThem.php';

include './ConnectBD.php';



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <title>BlogArt</title>
</head>
<body>
    <div class="container">
        <h1>Thématiques</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM thematique');

        ?>
        <table>
                <tr>
                    <th>NumThem</th>
                    <th>LibThem</th>
                    <th>NumLang</th>
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['NumThem'];?></th>
                    <th><?php echo $tuple['LibThem'];?></th>
                    <th><?php echo $tuple['NumLang'];?></th>
					<th><a href="DelThem.php?id=<?= $tuple["NumThem"] ?>">del</a></th>
					<th><a href="UpdThem.php?id=<?= $tuple["NumThem"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

