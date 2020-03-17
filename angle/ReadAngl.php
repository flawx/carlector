<?php 

include './initAngl.php';

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
        <h1>Angle</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM angle');

        ?>
        <table>
                <tr>
                    <th>NumAngl</th>
                    <th>LibAngl</th>
                    <th>NumLang</th>
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['NumAngl'];?></th>
                    <th><?php echo $tuple['LibAngl'];?></th>
                    <th><?php echo $tuple['NumLang'];?></th>
					<th><a href="DelAngl.php?id=<?= $tuple["NumAngl"] ?>">del</a></th>
					<th><a href="UpdAngl.php?id=<?= $tuple["NumAngl"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

