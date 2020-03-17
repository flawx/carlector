<?php 

include './ctrlSaisies.php';

include './ConnectBD.php';


include './initArt.php';

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
        <h1>Article</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM article');

        ?>
        <table>
                <tr>
                    <th>NumArt</th>
                    <th>DtCreA</th>
                    <th>LibTitrA</th>
                    <th>LibChapoA</th>
                    <th>LibAccrochA</th>
                    <th>Parag1A</th>
                    <th>LibSsTitr1</th>
                    <th>Parag2A</th>
                    <th>LibSsTitr2</th>
                    <th>Parag3A</th>
                    <th>LibConclA</th>
                    <th>UrlPhotA</th>
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
                    <th><?php echo $tuple['LibChapoA'];?></th>
                    <th><?php echo $tuple['LibAccrochA'];?></th>
                    <th><?php echo $tuple['Parag1A'];?></th>
                    <th><?php echo $tuple['LibSsTitr1'];?></th>
                    <th><?php echo $tuple['Parag2A'];?></th>
                    <th><?php echo $tuple['LibSsTitr2'];?></th>
                    <th><?php echo $tuple['Parag3A'];?></th>
                    <th><?php echo $tuple['LibConclA'];?></th>
                    <th><?php echo $tuple['UrlPhotA'];?></th>
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

            ?>
        <table>
    </div>
</body>
</html>

