<?php
include("../sql/fonctions_utilisateur.php");
include("inc/connexion.php");
if(isset($_GET['code']) && isset($_GET['pseudo']))
{
	$user=getUserByPseudo($connexion, $_GET['pseudo']);
	if($data=mysqli_fetch_assoc($user))
	{
		if($data['code_activation']==$_GET['code'])
		{
			validateUserByPseudo($connexion, $_GET['pseudo']);		
			header("refresh:2;url=../index.php" ); 
			echo "Validation r&eacute;ussie !";
		}
	}
	else
	{
		header("Location:../index.php");
	}
}
else
{
	header("Location:../index.php");
}

?>