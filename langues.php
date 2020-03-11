<?php

include "verifText.php";
include "connection.php";

if(isset($_POST['delete']))
{
    $NumLang = $_POST['NumLang'];

    echo $NumLang;

    $delete = $conn->prepare('DELETE FROM `langue` WHERE `NumLang` = \''.$NumLang.'\'');
    $delete->execute();
}


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
        
        $reponse = $conn->query('SELECT * FROM langue');

        ?>
        <table>
                <tr>
                    <th>NumLang</th>
                    <th>Lib1lang</th>
                    <th>Lib2lang</th>
                    <th>NumPays</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            <?php

            while($donnees = $reponse->fetch())
            {

            ?>
                <tr>
                    <th><?php echo $donnees['NumLang'];?></th>
                    <th><?php echo $donnees['Lib1Lang'];?></th>
                    <th><?php echo $donnees['Lib2Lang'];?></th>
                    <th><?php echo $donnees['NumPays'];?></th>
                    <th><a href="UPDLang1.php?NumPays=<?php echo $donnees['NumLang'];?>">✏️</a></th>
                    <th><form method="post" action=""><input type="hidden" name="NumLang" value="<?php echo $donnees['NumLang'];?>"><input type="submit" name="delete" value="❌" onClick="alert('Souhaitez-vous vraiment supprimer cette langue ?');"></form></th>
                </tr>
            <?php
            
            }
            $reponse->closeCursor();

            ?>
        <table>
    </div>
</body>
</html>