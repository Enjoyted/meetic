<?php
	include("php/inc/connexion.php");
	include("sql/fonctions_utilisateur.php");
	$valeur="";
	if(isset($_GET['id']))
	{
		$user=getUserById($connexion, $_GET['id']);
		if($data=mysqli_fetch_assoc($user))
		{
			$valeur=$data['pseudo'];
		}
	}
?>
<html>
	<head>
		<script type='text/javascript' src="javascript/checkForms.js"></script>
		<link rel="stylesheet" type="text/css" href="css/msgstyle.css">
	</head>
	<body>
		<header>
			<div class="container-logo">
				<a href="index.php"><img src="images/logo.png" alt="images"></a>
			</div>
		</header>
		<div class="conteneur">
			<div class="contenu">
				<form method='post' action='php/nouveau_message.php'>
						<div class="titre">Destinataire</div><br />
							<input type='text' class="destinataire" name='destinataire' style='width:25%' value='<?php echo $valeur; ?>'/><br />
						<div class="titre">Sujet</div><br/>
							<input type='text' name='sujet' class="sujet" value='(Sans objet)' onClick='changer(this)' style='width:50%;color:grey'/><br />
						<div class="titre">Message</div><br />
							<textarea name='message' class="textarea" style='width:60%;height:150px;'></textarea><br />
							<input type='submit' class="valid" value='envoyer' />
				</form>
			</div>
		</div>
	</body>
</html>