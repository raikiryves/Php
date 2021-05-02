<?php session_start(); 

?>

<?php


$pLogin = $_POST['name'];
$pMdp= $_POST['pass'];

$_SESSION['Login'] = $pLogin;
$_SESSION['Pass'] = $pMdp;


$retour = false;
$bdd = new PDO  ('mysql:host=localhost;dbname=gsbmedecin', 'root', '')
or die ('Erreur connexion à la base de données');
$requete= "select * from medecin where login = '$pLogin' and mdp ='$pMdp';";
$resultat = $bdd ->query($requete);
$retour = $resultat ->fetch();

if ($retour != null)
{
	header('location:Accueil.php');
}
else 
	echo  'incorrect Reassayer'


?>

<button onclick="http://localhost/Medecin.php" >Ressayer</button>


