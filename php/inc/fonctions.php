<?php

function afficherFormulaireDateNaissance()
{
	echo "<select name='jour_naissance'>";
	for($i=1;$i<=31;$i++)
	{
		echo "<option>";
		if($i<10)
			echo "0";
		echo $i."</option>";
	}
	echo "</select>";
	echo "<select name='mois_naissance'>";
	for($i=1;$i<=12;$i++)
	{
		echo "<option>";
		if($i<10)
			echo "0";
		echo $i."</option>";
	}
	echo "</select>";
	
	echo "<select name='annee_naissance'>";
	for($i=Date(Y)-18;$i>1900;$i--)
	{
		echo "<option>".$i."</option>";
	}
	echo "</select>";
}
function verifierAdresseMail($mail)  
{  
   $reg='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';  
   if(preg_match($reg,$mail))  
      return true;  
   else  
     return false;  
}
function afficherDateNaissance($date)
{
	$retour="";
	$retour.=substr($date,8,2)."/";
	$retour.=substr($date,5,2)."/";
	$retour.=substr($date,0,4);
	echo $retour;
	
}
function DateToAge($date)
{
	$age=date('Y')-(substr($date,0,4));
	if(date('m')<=substr($date,5,2))
	{
		$age--;
	}
	if(date('d')>=substr($date,8,2) && date('m')==substr($date,5,2))
	{
		$age++;
	}
	return $age;
}
function afficherFormulaireAge()
{
	for($i=18;$i<110;$i++)
	{
		echo "<option>".$i."</option>";
	}
}

function erreur($idError)
{
	switch($idError)
	{
		case 0:
			$retour="Ce pseudo est d&eacute;j&agrave; utilis&eacute;";
			break;
		case 1:
			$retour="Veuillez activer votre compte";
			break;
		case 3:
			$retour="Cette adresse email est d&eacute;j&agrave; utilis&eacute;e";
			break;
		case 4:
			$retour="Mot de passe incorrect";
			break;
		case 5:
			$retour="Vous devez avoir 18 ans";
			break;
		case 6:
			$retour="Ce n'est pas une adresse mail valide";
			break;
		default:
			$retour="";
			break;
	}
	return $retour;
}


?>