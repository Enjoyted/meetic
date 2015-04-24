<?php
include("php/inc/fonctions.php");
?>
<html>
	<head>
		<SCRIPT type="text/javascript" src="javascript/recherche.js"></SCRIPT>
		<link rel="stylesheet" type="text/css" href="css/recherchestyle.css" />
	</head>
	<body>
		<header>
			<div class="container-logo">
				<a href="index.php"><img src="images/logo.png" alt="images"></a>
			</div>
		</header>
		<div class="conteneur">
			<a href='home.php'><input type="sumbit" class="valid" value="Accueil" /></a><br /> <br />
				<div class="contenu">	
					<form action="php/recherche.php" method="post" id='formRecherche'>
						Sexe <input type='radio' name='sexe' value='Homme' />Homme&nbsp;&nbsp;&nbsp;<input type='radio' value='Femme' name='sexe' />Femme<br />
						Ag&eacute; de <select name='agemin'><?php afficherFormulaireAge() ?> </select> &agrave; <select name='agemax'><?php afficherFormulaireAge() ?> </select><br />
						Rajouter une ville : <input type='button' value='+' onClick="ajouterVille()"/><br />
						<div class="addville" id="addVille">
						</div>
					</form>
					<input type='button' class="valid" value='rechercher' onClick="submitForm('formRecherche')"/>
				</div>	
		</div>
	</body>
</html>