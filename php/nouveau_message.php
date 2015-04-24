<?php
include("../sql/fonctions_message.php");
include("../sql/fonctions_utilisateur.php");
include("inc/connexion.php");
if(isset($_POST['sujet']) && isset($_POST['message']) && isset($_POST['destinataire']))
{
	$user=getUserByPseudo($connexion, $_POST['destinataire']);
	if($data=mysqli_fetch_assoc($user))
	{
		nouveauMessage($connexion, $_POST['sujet'],$_POST['message'], $data['id_utilisateur'], $_SESSION['id'], date('Y-m-d H:i:s'));
		header( "refresh:3;url=../home.php" ); 
		echo "Message envoy&eacute; avec succ&egrave;s... Redirection...";
	}
	else
	{
		header("refresh 3;url=../home.php");
		echo "Cet utilisateur n&apos;existe pas";
	}

}
?>