<?php
include("php/inc/connexion.php");
include("sql/fonctions_message.php");
if(!isset($_SESSION['id']))
{
	header("Location:index.php");
}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/homestyle.css" />
	</head>
	<body>
		<header>
		<div class="container-logo">
			<a href="index.php"><img src="images/logo.png" alt="images"></a>
		</div>
		</header>
		<div class='conteneur'>
			<div class='titre'>
				Connect&eacute; en tant que <?php echo $_SESSION['pseudo']; ?> | &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
				<a href='php/logout.php'><input type="submit" id="deco" class="valid" value="D&eacute;connexion"/></a>
			</div>
			<div id='centre'>
				<div id='menu'>
					<a href='recherche.php'><input type='submit' class="valid border" value='Rechercher' /></a><br /><br />
					<a href='profil.php?id=<?php echo $_SESSION['id']?>'><input type="submit" class="valid border" value="Mon Compte"/></a><br /><br />
					<a href='messagerie.php'><input type="submit" class="valid border" value="Messagerie(<?php afficherNombreMessageNonLu($connexion, $_SESSION['id']);?>)"/></a> <br /><br />
				</div>
				<div id='contenu'>
				</div>
			</div>
		</div>
	</body>
</html>