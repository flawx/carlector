<?php 

include './initLang.php';

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
        <h1>Langues</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM langue');

        ?>
        <table>
                <tr>
                    <th>NumLang</th>
                    <th>Lib1lang</th>
                    <th>Lib2lang</th>
                    <th>NumPays</th>
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['NumLang'];?></th>
                    <th><?php echo $tuple['Lib1Lang'];?></th>
                    <th><?php echo $tuple['Lib2Lang'];?></th>
                    <th><?php echo $tuple['NumPays'];?></th>
					<th><a href="DelLang.php?id=<?= $tuple["NumLang"] ?>">del</a></th>
					<th><a href="UpdLang.php?id=<?= $tuple["NumLang"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

