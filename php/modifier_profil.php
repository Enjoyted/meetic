<?php
include("inc/connexion.php");
include("inc/fonctions.php");
include("../sql/fonctions_utilisateur.php");
if(isset($_POST['champ']) && isset($_POST[$_POST['champ']]))
{
	if($_POST['champ']=="pseudo")
	{
		$req=getUserByPseudo($connexion, $_POST[$_POST['champ']]);
		if($data=mysqli_fetch_assoc($req))
		{
			header("Location:../profil.php?id=".$_SESSION['id']."&error=0");
		}
		else
		{
			modifierProfilUser($connexion, $_POST['champ'], $_POST[$_POST['champ']], $_SESSION['id']);
			header("Location:../profil.php?id=".$_SESSION['id']);
		}
	}
	else
	{
		if($_POST['champ']=="email")
		{
			if(verifierAdresseMail($_POST[$_POST['champ']]))
			{
				$req=getUserByEmail($connexion, $_POST[$_POST['champ']]);	
				if($data=mysqli_fetch_assoc($req))
				{
					header("Location:../profil.php?id=".$_SESSION['id']."&error=3");
				}
				else
				{
					modifierProfilUser($connexion, $_POST['champ'], $_POST[$_POST['champ']], $_SESSION['id']);
					header("refresh:3;url=../profil.php?id=".$_SESSION['id']);
					echo "bravo vous avez modifier votre email";
				}
			}
			else
			{
				header("Location:../profil.php?id=".$_SESSION['id']."&error=6");
			}
		}
		else
		{
			modifierProfilUser($connexion, $_POST['champ'], $_POST[$_POST['champ']], $_SESSION['id']);
			header("refresh:3;url=../profil.php?id=".$_SESSION['id']);
			echo "bravo vous avez modifier vos infos";
		}
	}
}
else
{
	if(isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['oldpass']))
	{
		$user=getUserById($connexion,$_SESSION['id']);
		if($data=mysqli_fetch_assoc($user))
		{
			if(md5("jardin".$_POST['oldpass']."verdure")==$data['password'])
			{
				modifierProfilUser($connexion, "password", md5("jardin".$_POST['password']."verdure"), $_SESSION['id']);
				header("refresh:3;url=../profil.php?id=".$_SESSION['id']);
				echo "bravo vous avez modifier votre mot de passe";
			}
			else
			{
				header("refresh:1;url=../profil.php?id=".$_SESSION['id']."&error=4");
			}
		}
		else
		{
			header("Location:./index.php");
		}
	}
	else
	{
		header("Location:./index.php");
	}
}	

?>