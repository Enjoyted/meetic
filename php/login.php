<?php
include("inc/connexion.php");
include("../sql/fonctions_utilisateur.php");
if(isset($_POST['login']) && isset($_POST['password']))
{
	$user=getUserByPseudo($connexion, $_POST['login']);
	if($data=mysqli_fetch_assoc($user))
	{
		if($data['active']==1)
		{
			echo $data['password']."<br/>";
			echo md5("jardin".$_POST['password']."verdure");
			if($data['password']==md5("jardin".$_POST['password']."verdure"))
			{
				$_SESSION['id']=$data['id_utilisateur'];
				$_SESSION['pseudo']=$data['pseudo'];
				$_SESSION['sexe']=$data['sexe'];
				$_SESSION['cherche']=$data['cherche'];
				header("Location:../home.php");
			}
		}
		else
		{
			header("Location:../index.php?error=1");
		}
	}
	else
	{
		header("Location:../index.php?error=2");
	}
}

?>