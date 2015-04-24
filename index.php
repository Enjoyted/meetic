<?php
	include("php/inc/fonctions.php");
	include('php/inc/connexion.php');
	if(isset($_SESSION['id']))
	{
		header("Location:home.php");
	}
?>
<html>
	<head>
		<script language="Javascript" src="javascript/checkForms.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<header>
			<div class="container-logo">
				<a href="index.php"><img src="images/logo.png" alt="images"></a>
			</div>
		</header>
		<div class='conteneur ctn-connexion' >
				<div id='haut'>
					<div class="titre">
						Connexion
					</div>
					<div id='login'>
						<form action='php/login.php' method='post'>
							<input type='text' name='login' id='champLogin' value='Pseudo' onClick="Reset('champLogin')" />
							<input type='password' name='password' id='champPassword' value='Mot de passe' onClick="Reset('champPassword')" />
							<input type='submit' class=" valid" id="valid2" value='Connexion' /><br />
							<input type='checkbox' name='remember' /><span>M&eacute;moriser mes identifiants</span>
						</form>
					</div>
				</div>
			</div>
			<div class='conteneur' >
				<div class="titre">
						Inscription
					</div>
			<div id='centre'>
				<div id='inscription'>
					<form action='php/inscription.php' method='post' id='formulaireInscription' class="form-insc">
						<p id='error' style='color:red'><?php if(isset($_GET['error'])){echo(erreur($_GET['error']));} ?></p>
						<label for="pseudo">Pseudo :</label> <input type='text' name='pseudo' id='pseudo' maxlength="14" /><br />
						<label for="pass">Mot de passe :</label> <input type='password' name='password' id='pass' onkeyup="checkPassword()" maxlength="25" /><br />
						<label for="cpass">Confirmation du mot de passe : </label>  <input type='password' name='cpassword' onkeyup="checkPassword()" id='cpass' maxlength="25" /> <img src='view/images/erreur.png'id='imagePass' /><br />
						<label for="email">E-mail : </label> <input type='text' name='email' id='email' onkeyup="checkEmail()" onChange="checkEmail()" /> <img src='view/images/erreur.png'  id='imageEmail' /><br />
						<label for="nom">Nom : </label> 	<input type='text' id='nom' name='nom' maxlength="20" /><br />
						<label for="prenom">Prenom :</label>  <input type='text' id='prenom' name='prenom' maxlength="20" /><br />
						<label for="jour_naissance">Date de naissance :</label> <?php afficherFormulaireDateNaissance(); ?><br />
						<label for="sexe">Sexe :</label>  <select name='sexe' id='sexe' onkeyup="checkSexe()" onChange="checkSexe()"><option>-</option><option>Homme</option><option>Femme</option></select> <img src='images/erreur.png' id='imageSexe' /><br />
						<label for="cherche">Cherche :</label>  <select name='cherche' id='cherche' onChange="checkCherche()"><option>-</option><option>Homme</option><option>Femme</option></select> <img src='images/erreur.png' id='imageCherche' /><br />
						<label for="ville">Ville :</label>  <input type='text' name='ville' id='ville' /><br />
						<input type='submit' class="valid" onClick='checkFormulaire()' value='S&apos;inscrire' /><div style="clear:both"></div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>