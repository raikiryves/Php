<?php session_start();?>

<!DOCTYPE html>
<html>
<title>Acceuil</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<body>

<?php


$LeMedecin = getLeMedecins($_SESSION['Login'],$_SESSION['Pass']);




?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">GSB</a>
  
  
  <!-- Search Bar -->
  <form class="form-inline" action="OtherProfiles.php" method='post'>
    <input class="form-control mr-sm-2" type="text" placeholder="Search" name='Search'>
    <button class="btn btn-success" type="submit">Search</button>
  </form>
  
  <!-- Links -->
  <ul class="navbar-nav" style= >
    <li class="nav-item">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Trending</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Messages</a>
    </li>
	<li class="nav-item">
      <a class="nav-link" href="#"><img class="rounded-circle avatar-50" src="01.jpg" width="30%" alt=""><?php echo $LeMedecin["nomMedecin"] ?></a>
    </li>
  </ul>
</nav>

<br>

<div class="container" >

<div class="row">
  
  <div class="card" style="width:400px" class="col-lg-6" >
    <img class="card-img-top" src="posts.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title"><?php echo $LeMedecin["nomMedecin"] ?></h4>
      <p class="card-text">Vous etes connecter, mais le site est encore en maintenance pas fonction sont encore dispo</p>
      <a href="#" class="btn btn-primary">Okay</a>
    </div>
	

  <!-- Post -->
  <div class="card" style="width:400px" class="col-lg-6">
    <div class="card-body">
      <h4 class="card-title">Demandez une medication</h4>
	  <form action="NewPost.php" method='post' >
	  <textarea name="textarea" rows="5" cols="30" placeholder="Ecrivez quelque chose...." ></textarea>
	  <br>
      <input type="submit" value="Post" />
	  
	  </form>
    </div>
  </div>
 
</div>  
</div>

</div>

  <br><br>
  
  

<?php

function getLeMedecins($Login,$Mdp)
{
$leMedecins = null;
$bdd = new PDO('mysql:host=localhost;dbname=medecin', 'root', '')
or die('Erreur connexion à la base de données');
$requete = "select * from gsbmedecin where login = '$Login' and mdp ='$Mdp';";
$resultat = $bdd -> query($requete);
$leMedecins = $resultat -> fetch();
return $leMedecins;
}
?>


</body>
</html>
