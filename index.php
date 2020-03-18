<?php 

include 'Article/ctrlSaisies.php';
include 'Article/ConnectBD.php';
include 'Article/initArt.php';

?>
<!DOCTYPE html>
<html>
<title>Le Carlector Bordelais</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
<body class="w3-light-grey">

<header id="header" class="w3-container w3-center"> 
    <a class="logo" href=""><img src="newcarlectorFichier 4.svg"></a>
    <div class="nav-left w3-padding-32">
        <a class="nav" href="">Essais</a>
        <a class="nav" href="">Pratique</a>
    </div>
    <div class="nav-right w3-padding-32">
        <a class="nav" href="">Marques</a>
        <a class="nav" href="">Connexion</a>
    </div>
</header>

<div class="w3-row">

<div class="w3-col l8 s12">

  <?php

  $reponse = $bdPdo->query('SELECT * FROM article');

  while($tuple = $reponse->fetch())
  {

  ?>
  <div class="w3-card-4 w3-margin w3-white">
    <img src="<?php echo $tuple['UrlPhotA'];?>" alt="<?php echo $tuple['LibTitrA'];?>" style="width:100%">
    <div class="w3-container">
      <h3><b><?php echo $tuple['LibTitrA'];?></b></h3>
      <h5><?php echo $tuple['LibChapoA'];?>, <span class="w3-opacity"><?php echo $tuple['DtCreA'];?></span></h5>
    </div>

    <div class="w3-container">
      <p><?php echo $tuple['LibAccrochA'];?></p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>LIRE L'ARTICLE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Likes  </b> <span class="w3-tag"><?php echo $tuple['Likes'];?></span></span></p>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <?php
            
  }
  $reponse->closeCursor();

  ?>

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

    $reponse = $bdPdo->query('SELECT * FROM article ORDER BY Likes DESC');

    while($tuple = $reponse->fetch())
    {

    ?>
      <li class="w3-padding-16">
        <img src="<?php echo $tuple['UrlPhotA'];?>" alt="Image" class="w3-left w3-margin-right" style="width:50px">
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