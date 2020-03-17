<?php 

include './initMC.php';

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
        <h1>Mots Clés</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM motcle');

        ?>
        <table>
                <tr>
                    <th>NumMoCle</th>
                    <th>LibMoCle</th>
                    <th>NumLang</th>
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['NumMoCle'];?></th>
                    <th><?php echo $tuple['LibMoCle'];?></th>
                    <th><?php echo $tuple['NumLang'];?></th>
					<th><a href="DelMC.php?id=<?= $tuple["NumMoCle"] ?>">del</a></th>
					<th><a href="UpdMC.php?id=<?= $tuple["NumMoCle"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

