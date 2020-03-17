<?php 

include './initCom.php';

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
        <h1>Commentaire</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM COMMENT');

        ?>
        <table>
                <tr>
                    <th>NumCom</th>
                    <th>DtCreC</th>
                    <th>PseudoAuteur</th>
                    <th>LibCom</th>
                    <th>NumArt</th>

					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['NumCom'];?></th>
                    <th><?php echo $tuple['DtCreC'];?></th>
                    <th><?php echo $tuple['PseudoAuteur'];?></th>
                    <th><?php echo $tuple['LibCom'];?></th>
                    <th><?php echo $tuple['NumArt'];?></th>
                  
					<th><a href="DelCom.php?id=<?= $tuple["NumCom"] ?>">del</a></th>
					<th><a href="UpdCom.php?id=<?= $tuple["NumCom"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

