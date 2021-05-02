<?php include 'gsbmedecin.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<title>Connexion</title>
<body>




<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

<img class="img" src="gsb.png" alt="gsb">


<div class="container">
  <h2>Connectez-vous</h2>
 <form action=" php03.php " method="post" onsubmit="verifLoginMdp()">
    <div class="form-group">
      <label for="name">Nom Utilisateur:</label>
      <input type="text" class="form-control" id="name" name="name"  placeholder="Entrez votre nom Utilisateur">
    </div>
    <div class="form-group">
      <label for="pwd">mot de passe:</label>
      <input type="password" class="form-control" id="pwd" name="pass" placeholder="Entrez mot de passe">
    </div>
    <div class="checkbox">
      <p><a href="http://localhost/inscription.php" title="J'ai pas de compte!">je veux m'inscrire</a></p>
    </div>
    <button type="submit" class="btn btn-default" >Connectez-vous</button>
  </form>
</div>
	   
<br/><br/><br/><br/>	   
		
<?php
$lesMedecins = getLesMedecins();
foreach($lesMedecins as $Medecins)
{
echo $Medecins["nomMedecin"];echo ",";
echo $Medecins["login"];echo ", ";
echo $Medecins["mdp"];echo ", ";
?>
<br>
<?php
}
?>


</body>

<?php
function getLesMedecins()
{
$lesMedecins = null;
$bdd = new PDO('mysql:host=localhost;dbname=medecin', 'root', '')
or die('Erreur connexion à la base de données');
$requete = "select * from gsbmedecin;";
$resultat = $bdd -> query($requete);
$lesMedecins = $resultat -> fetchAll();
return $lesMedecins;
}
?>