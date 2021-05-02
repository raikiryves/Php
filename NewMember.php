<?php session_start(); ?>

<?php
$pre = $_POST['prenom'];
$nom = $_POST['nom'];
$Login = $_POST['name'];
$Mdp = $_POST['pass'];
$postal = $_POST['postal'];
$adres = $_POST['adresse'];

function Insert($pre,$nom,$Login,$Mdp,$postal,$adres)
{
$bdd = new PDO('mysql:host=localhost;dbname=medecin', 'root', '')
or die('Erreur connexion à la base de données');
$requete="insert into gsbmedecin values('1','$nom','$pre','$adres','$postal','21-01-2001','$Login','$Mdp');";
$retour = $bdd -> exec($requete);
return $retour;
}

$Ok = Insert($pre,$nom,$Login,$Mdp,$postal,$adres);

if ($Ok)
{
	echo 'success';
	echo $_POST['name'];
}

else
{ 
echo 'oh no';
}

?>