<?php
include("inc/connexion.php");
include("../sql/fonctions_utilisateur.php");
include("inc/fonctions.php");

$tab=getUserByPseudo($connexion, $_POST['pseudo']);
if($data=mysqli_fetch_assoc($tab))
{
	header("Location:../index.php?error=0");
}
else
{
	$tab=getUserByEmail($connexion, $_POST['email']);
	if($data=mysqli_fetch_assoc($tab))
	{
		header("Location:../index.php?error=3");
	}
	else
	{
		if(dateToAge($_POST['annee_naissance']."-".$_POST['mois_naissance']."-".$_POST['jour_naissance'])<18)
		{
			header("Location:../index.php?error=5");
		}
		else
		{
			nouvel_utilisateur($connexion, $_POST['pseudo'],$_POST['password'],$_POST['email'],$_POST['nom'],$_POST['prenom'],$_POST['jour_naissance'],$_POST['mois_naissance'],$_POST['annee_naissance'],$_POST['sexe'],$_POST['cherche'],$_POST['ville']);
			$subject="Mail de confirmation";
			$msg="Pour confirmer votre inscription veuillez suivre le lien ci-dessous :  http://localhost/meetic/php/validation.php?code=".md5("jardin".$_POST['pseudo']."verdure")."&pseudo=".$_POST['pseudo'];
			mail($_POST['email'], $subject, $msg);
		}
	}
}

header( "refresh:3;url=../index.php" ); 
echo "<p style='text-align:center;'>Inscription r&eacute;ussie<br />Un email de validation vous a &eacute;t&eacute; envoy&eacute;<br />Vous allez &ecirc;tre redirig&eacute; dans 3s</p>"

?>
