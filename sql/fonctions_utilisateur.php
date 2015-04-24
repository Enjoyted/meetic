<?php

//supprimer les messages où l'utilisateur supprimé est concerné

function nouvel_utilisateur($connexion,$pseudo,$password,$email,$nom,$prenom,$jour_naissance,$mois_naissance,$annee_naissance,$sexe,$cherche,$ville)
{
	$sql="INSERT INTO utilisateur (pseudo, password, email, nom, prenom, date_naissance, sexe, cherche , ville, code_activation)
	VALUES ('".mysql_real_escape_string($pseudo)."',
			'".mysql_real_escape_string(md5("jardin".$password."verdure"))."',
			'".mysql_real_escape_string($email)."',
			'".mysql_real_escape_string($nom)."',
			'".mysql_real_escape_string($prenom)."',
			'".mysql_real_escape_string($annee_naissance."-".$mois_naissance."-".$jour_naissance)."',
			'".mysql_real_escape_string($sexe)."',
			'".mysql_real_escape_string($cherche)."',
			'".mysql_real_escape_string($ville)."',
			'".mysql_real_escape_string(md5("jardin".$pseudo."verdure"))."')";
	$req=mysqli_query($connexion,$sql);
}

function getUserByPseudo($connexion, $pseudo)
{
	$sql="SELECT * FROM utilisateur WHERE pseudo='".$pseudo."'";
	$req=mysqli_query($connexion, $sql);
	return $req;
}
function getUserByEmail($connexion, $email)
{
	$sql="SELECT * FROM utilisateur WHERE email='".mysql_real_escape_string($email)."'";
	$req=mysqli_query($connexion, $sql);
	return $req;
}

function getUserById($connexion, $id)
{
	$sql="SELECT * FROM utilisateur WHERE id_utilisateur='".mysql_real_escape_string($id)."'";
	$req=mysqli_query($connexion,$sql);
	return $req;
}

function validateUserByPseudo($connexion, $pseudo)
{
	$sql="UPDATE utilisateur SET active='1' WHERE pseudo='".mysql_real_escape_string($pseudo)."'";
	$req=mysqli_query($connexion,$sql);
}

function rechercheUser($connexion, $agemin, $agemax, $ville, $sexe, $cherche)
{
	$sql="SELECT * FROM utilisateur WHERE cherche='".mysql_real_escape_string($cherche)."' ";
	if($sexe!="") // deux solutions soit on cherche les deux sexes c'est le cas ici soit il faut modifier dans la page recherche.php la valeur de $_POST['sexe']
	{
		$sql.="AND sexe='".mysql_real_escape_string($sexe)."' ";
	}
	$sql.="AND date_naissance<='".mysql_real_escape_string((date('Y')-$agemin))."-".mysql_real_escape_string(date('m'))."-".mysql_real_escape_string(date('d'))."' ";
	$sql.="AND date_naissance>='".mysql_real_escape_string((date('Y')-$agemax-1))."-".mysql_real_escape_string(date('m'))."-".mysql_real_escape_string(date('d'))."' ";
	if(count($ville)>0)
	{
		$sql.="AND (";
	}
	foreach($ville as $v)
	{
		$sql.="ville='".mysql_real_escape_string($v)."' OR ";
	}
	if(count($ville)>0)
	{
		$sql.=" '')";
	}
	$req=mysqli_query($connexion,$sql);
	return $req;
}
function supprimerUser($connexion, $id)
{
	$sql="DELETE FROM utilisateur WHERE id_utilisateur='".mysql_real_escape_string($id)."'";
	mysqli_query($connexion,$sql);
}
function modifierProfilUser($connexion, $champ, $new, $id)
{
	$sql="UPDATE utilisateur SET ".mysql_real_escape_string($champ)."='".mysql_real_escape_string($new)."' WHERE id_utilisateur='".mysql_real_escape_string($id)."'";
	mysqli_query($connexion, $sql);
}
?>