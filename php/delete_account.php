<?php
include("../sql/fonctions_utilisateur.php");
include("inc/connexion.php");
$req=getUserById($connexion, $_SESSION['id']);
$data=mysqli_fetch_assoc($req);
if($data['password']==md5("jardin".$_POST['password']."verdure"))
{
	supprimerUser($connexion, $_SESSION['id']);
	header("refresh:3;url=	logout.php");
	echo "<span style='text-align:center'>Votre compte a &eacute;t&eacute; supprim&eacute; avec succ&egrave;s<br />Redirection dans 1 seconde</span>";
}
?>