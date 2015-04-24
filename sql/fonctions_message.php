<?php
function afficherNombreMessageNonLu($connexion, $id)
{
	$sql="SELECT id_message FROM message WHERE id_utilisateur_destination='".mysql_real_escape_string($id)."' AND lu='0'";
	$req=mysqli_query($connexion,$sql);
	$i=0;
	while($data=mysqli_fetch_assoc($req))
	{
		$i++;
	}
	echo $i;
}

function getMessageById($connexion, $id, $id_user)
{
	$sql="SELECT * FROM message WHERE id_utilisateur_destination='".mysql_real_escape_string($id_user)."' AND id_message='".mysql_real_escape_string($id)."'";
	$req=mysqli_query($connexion,$sql);
	return $req;
}
function marquerMessageLu($connexion, $id_message, $id_user)
{
	$sql="UPDATE message SET lu='1' WHERE id_message='".mysql_real_escape_string($id_message)."' AND id_utilisateur_destination='".($id_user)."'";
	$req=mysqli_query($connexion,$sql);
}

function getMessageByUserId($connexion, $id)
{
	$sql="SELECT * FROM message WHERE id_utilisateur_destination='".mysql_real_escape_string($id)."'";
	$req=mysqli_query($connexion, $sql);
	return $req;
}
function supprimerMessageById($connexion, $id)
{
	$sql="DELETE FROM message WHERE id_message='".mysql_real_escape_string($id)."'";
	$req=mysqli_query($connexion, $sql);
}
function nouveauMessage($connexion, $sujet,$message,$id_dest, $id_source, $date)
{
	$sql="INSERT INTO message (sujet, contenu, id_utilisateur_source, id_utilisateur_destination, date) VALUES ('".mysql_real_escape_string($sujet)."',
		'".mysql_real_escape_string($message)."',
		'".mysql_real_escape_string($id_source)."',
		'".mysql_real_escape_string($id_dest)."',
		'".mysql_real_escape_string($date)."')";
	$req=mysqli_query($connexion,$sql);
}

?>