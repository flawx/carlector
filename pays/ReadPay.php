<?php 

include './initPay.php';

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
        <h1>Pays</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM Pays');

        ?>
        <table>
                <tr>
                    <th>idPays</th>
                    <th>cdPays</th>
                    <th>numPays</th>
                    <th>frPays</th>
                    <th>enPays</th>
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['idPays'];?></th>
                    <th><?php echo $tuple['cdPays'];?></th>
                    <th><?php echo $tuple['numPays'];?></th>
                    <th><?php echo $tuple['frPays'];?></th>
                    <th><?php echo $tuple['enPays'];?></th>
					<th><a href="DelPay.php?id=<?= $tuple["idPays"] ?>">del</a></th>
					<th><a href="UpdPay.php?id=<?= $tuple["idPays"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

