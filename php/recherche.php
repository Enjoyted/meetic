<?php
include("../sql/fonctions_utilisateur.php");
include("inc/fonctions.php");
include("inc/connexion.php");
$id=0;
$ville=Array();
while(isset($_POST['ville'.$id]))
{
	$ville['ville'.$id]=$_POST['ville'.$id];
	$id++;
}
if(!isset($_POST['sexe']))
{
	$_POST['sexe']=""; // ou alors $_POST['sexe']=$_SESSION['cherche']
}
$req=rechercheUser($connexion, $_POST['agemin'], $_POST['agemax'], $ville, /*$_SESSION['cherche'] */$_POST['sexe'], $_SESSION['sexe']); /* La recherche n'affiche que les personnes qui cherchent une personne de votre sexe */
echo "<a href='../home.php'>Accueil</a><br />";
$retour="<table>";
$retour.="<tr><td>Pseudo</td><td>Age</td><td>Sexe</td><td>Ville</td></tr>";
while($data=mysqli_fetch_assoc($req))
{
	$retour.="<tr>";
	$retour.="<td><a href='../profil.php?id=".$data['id_utilisateur']."'>".$data['pseudo']."</a></td>
				<td>".dateToAge($data['date_naissance'])."</td>
				<td>".$data['sexe']."</td>
				<td>".$data['ville']."</td>";
	$retour.="</tr>";
}
$retour.="</table>";
echo $retour;
 ?>