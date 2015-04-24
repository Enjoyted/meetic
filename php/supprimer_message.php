<?php
	include("inc/connexion.php");
	include("../sql/fonctions_message.php");
	if(isset($_GET['id']))
	{
		$message=getMessageById($connexion, $_GET['id'], $_SESSION['id']);
		if($data=mysqli_fetch_assoc($message))
		{
			supprimerMessageById($connexion, $_GET['id']);
			header("Location:../messagerie.php");
		}
		else
		{
			echo "ce message n'existe pas";
		}
	}