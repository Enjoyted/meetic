<?php
include("php/inc/connexion.php");
include("php/inc/fonctions.php");
include("sql/fonctions_utilisateur.php");
if(!isset($_SESSION['id']))
{
	header("Location:index.php");
}
else
{
	if(isset($_GET['id']))
	{
		$user=getUserById($connexion,$_GET['id']);
		$data=mysqli_fetch_assoc($user);
	}
	else
	{
		header("Location:index.php");
	}
}
?>
<html>
	<head>
		<script type='text/javascript' src="javascript/profil.js"></script>
		<link rel="stylesheet" type="text/css" href="css/profilstyle.css" />
	</head>
	<body>
	<header>
		<div class="container-logo">
			<a href="index.php"><img src="images/logo.png" alt="images"></a>
		</div>
	</header>
		<div id='conteneur'>
			<div class='contenu'>
				<a href='home.php'><input type="sumbit" class="valid" value="Accueil" /></a><br /> <br />
				<div style='color:red;'><?php  if(isset($_GET['error'])) echo erreur($_GET['error']); ?></div>
					<div class="tablemarg">	
						<table class="table" style="width:72%">
							<tr>
								<td>Pseudo :</td> 
								<td><?php echo $data['pseudo'];
									if($_SESSION['id']!=$_GET['id']) 
									{
										echo "&nbsp;<a href='ecrire_message.php?id=".$data['id_utilisateur']."'><img src='images/enveloppe.PNG' width='25' height='17' /></a>"; 
									}
									?>
								</td>
								<td><?php if($_SESSION['id']==$_GET['id']) echo "<span onClick='modifier(this)' id='pseudo' class'pointer'>Modifier</span>" ?></td>
							</tr>
							<tr>
								<td>Age : </td>
								<td colspan='2'><?php echo dateToAge($data['date_naissance']	); ?></td>
							</tr>
							<?php 
								if($_SESSION['id']==$_GET['id'])
									echo "<form action='php/modifier_profil.php' method='post' id='formulairePass'><tr>
											<td>Ancien mot de passe :</td>
											<td colspan='2'><input type='password' name='oldpass' autocomplete='off'/></td>
										</tr>
										<tr>
											<td>Mot de passe :</td>
											<td colspan='2'><input type='password' name='password' id='pass' onkeyup='checkPassword()' /></td>
										</tr><br />
										<tr>
											<td>Confirmation mot de passe :</td>
											<td><input type='password' name='cpassword' onkeyup='checkPassword()' id='cpass' />
												<img src='images/erreur.png' width='15' height='15' id='imagePass' />
											</td>
											<td><span onClick=\"envoyerFormulaire('formulairePass')\"> Modifier </span>
										</tr></form>";
							?>
							<tr>
								<td>E-mail :</td>
								<td><?php echo $data['email'];?></td>
								<td><?php if($_SESSION['id']==$_GET['id']) echo "<span onClick='modifier(this)' id='email' class'pointer'>Modifier</span>"; ?>
							</tr>
							<tr>
								<td>Nom :</td>
								<td><?php echo $data['nom']; ?></td>
								<td><?php if($_SESSION['id']==$_GET['id']) echo "<span onClick='modifier(this)' id='nom' class'pointer'>Modifier</span>"; ?>
							</tr>
							<tr>
								<td>Prenom :</td>
								<td><?php echo $data['prenom'];?></td>
								<td><?php if($_SESSION['id']==$_GET['id']) echo "<span onClick='modifier(this)' id='prenom' class'pointer'>Modifier</span>"; ?>
							</tr>
							<tr>
								<td>Date de naissance :</td>
								<td colspan='2'> <?php afficherDateNaissance($data['date_naissance']); ?></td>
							</tr>
							<tr>
								<td>Sexe :</td>
								<td colspan='2'> <?php echo $data['sexe']; ?></td>
							</tr><br />
							<tr>
								<td>Ville :</td>
								<td> <?php echo $data['ville']; ?></td>
								<td><?php if($_SESSION['id']==$_GET['id']) echo "<span onClick='modifier(this)' id='ville' class'pointer'>Modifier</span>"; ?>
							</tr><br />
						</table><br /> <br />
					</div>	
				<?php if($_SESSION['id']==$_GET['id']) echo "<p id='supCompte'><a href='#'  onClick='supprimerCompte(this)'><input type='submit' class='valid2' value='Supprimer mon compte' /></a></p>";?>
			</div>
		</div>
	</body>
</html>