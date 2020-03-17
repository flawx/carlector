<?php 

include './initUse.php';
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
        <h1>User</h1>
        <?php
        
        $reponse = $bdPdo->query('SELECT * FROM user');

        ?>
        <table>
                <tr>
                    <th>Login</th>
                    <th>Pass</th>
                    <th>LastName</th>
                    <th>FirstName</th>
                    <th>EMail</th>
                  
					<th>Suppr</th>
					<th>Modif</th>
                </tr>
            <?php

            while($tuple = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $tuple['Login'];?></th>
                    <th><?php echo $tuple['Pass'];?></th>
                    <th><?php echo $tuple['LastName'];?></th>
                    <th><?php echo $tuple['FirstName'];?></th>
                    <th><?php echo $tuple['EMail'];?></th>
					<th><a href="DelUse.php?id=<?= $tuple["Login"] ?>">del</a></th>
					<th><a href="UpdUse.php?id=<?= $tuple["Login"] ?>">upd</a></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>

