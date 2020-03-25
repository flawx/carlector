<?php 

include 'Article/ctrlSaisies.php';
include 'Article/ConnectBD.php';
include 'Article/initArt.php';

if(isset($_GET['id']))
{
    $NumArt = $_GET['id'];
    if(!empty($NumArt))
    {
        $reponse = $bdPdo->query("SELECT * FROM article WHERE NumArt = $NumArt");
        while($tuple = $reponse->fetch())
        {

        ?>

        <!DOCTYPE html>
        <html>
        <title><?php echo $tuple['LibTitrA'];?> - Le Carlector Bordelais</title>
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
            <h1 class="article-title"><b><?php echo $tuple['LibTitrA'];?></b></h1>
            <h3 class="article-subtitle"><?php echo $tuple['LibChapoA'];?></h3>
            <h5><span class="w3-opacity">Article posté le <?php echo $tuple['DtCreA'];?></span></h5>
            <img class="article-image" src="<?php // echo $tuple['UrlPhotA'];?>https://upload.wikimedia.org/wikipedia/commons/e/ef/Alfa_Romeo_6C_Freccia_d%27Oro_1949.jpg" alt="<?php echo $tuple['LibTitrA'];?>" style="width:100%;max-height:400px;object-fit:cover;">
        </div>

        <div class="w3-col l8 s12">

        <div class="w3-card-4 w3-margin w3-white">
            <div class="w3-container">
            <p>
            <?php echo $tuple['Parag1A'];?><br/>
            <h3><?php echo $tuple['LibSsTitr1'];?></h3>
            <?php echo $tuple['Parag2A'];?><br/>
            <h3><?php echo $tuple['LibSsTitr2'];?></h3>
            <?php echo $tuple['Parag3A'];?><br/><br/>
            <?php echo $tuple['LibConclA'];?><br/>
            </p>
            </div>
        </div>
        <hr>

        </div>

        <div class="w3-col l4">
        <div class="w3-card w3-margin w3-margin-top">
            <div class="w3-container w3-white">
            <h4><b>Catégories</b></h4>
            </div>
        </div><hr>
        
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
            <h4>Populaires</h4>
            </div>
            <ul class="w3-ul w3-hoverable w3-white">
            <?php

            $reponse1 = $bdPdo->query('SELECT * FROM article ORDER BY Likes DESC');

            while($tuple = $reponse1->fetch())
            {

            ?>
            <li class="w3-padding-16">
                <img src="<?php // echo $tuple['UrlPhotA'];?>https://upload.wikimedia.org/wikipedia/commons/e/ef/Alfa_Romeo_6C_Freccia_d%27Oro_1949.jpg" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                <span class="w3-large"><?php echo $tuple['LibTitrA'];?></span><br>
                <span><?php echo $tuple['LibChapoA'];?></span>
            </li>
            <?php
            
            }
            $reponse->closeCursor();
            
            ?>
            </ul>
        </div>
        <hr> 
        
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
            <h4>Mot clés</h4>
            </div>
            <div class="w3-container w3-white">
            <p>
            <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Lorem</span>
            </p>
            </div>
        </div>
        
        </div>

        </div><br>

        </div>

        <footer class="w3-container w3-dark-grey w3-padding-32 w3-margin-top">

        </footer>

        </body>
        </html>
        
        <?php

        }
        $reponse->closeCursor();

    }
}

?>