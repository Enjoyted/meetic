<?php
include("php/inc/connexion.php");
include("sql/fonctions_message.php");
include("sql/fonctions_utilisateur.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/messageriestyle.css">
	</head>
	<body>
		<header>
			<div class="container-logo">
				<a href="index.php"><img src="images/logo.png" alt="images"></a>
			</div>
		</header>
		<div class="conteneur">
			<a href='home.php'><input type="submit" class="valid" value="Accueil" /></a><br />
			<?php
				if(isset($_GET['idMessage']))
				{
					$req=getMessageById($connexion, $_GET['idMessage'], $_SESSION['id']);
					if($data=mysqli_fetch_assoc($req))
					{
						echo "Sujet : ".$data['sujet']."<br /> Message : <br />".$data['contenu'];
						echo "<br /><a href='ecrire_message.php?id=".$_data2['id_utilisateur_source']."'>R&eacute;pondre</a>&nbsp;&nbsp;<a href='php/supprimer_message.php?id=".$data['id_message']."'>Supprimer</a>";
					}
					marquerMessageLu($connexion, $_GET['idMessage'], $_SESSION['id']);
				}
				else
				{
					echo "<br /> <br /> <br />";
					$req=getMessageByUserId($connexion, $_SESSION['id']);
					echo "<div class='contenu'><table>";
					echo "<tr><td>Date</td><td>De</td><td>Sujet</td><td>Op&eacute;ration</td></tr>";
					while($data=mysqli_fetch_assoc($req))
					{
						
						$user=getUserById($connexion, $data['id_utilisateur_source']);
						if($data2=mysqli_fetch_assoc($user))
						{
							echo "<tr>
									<td>".$data['date']."</td>
									<td>".$data2['pseudo']."</td>
									<td>".$data['sujet']."</td>
									<td><a href='ecrire_message.php?id=".$data['id_utilisateur_source']."'>R&eacute;pondre</a>&nbsp;&nbsp;<a href='php/supprimer_message.php?id=".$data['id_message']."'>Supprimer</a></td>
								</tr>";
						}
					}
					echo "</table></div>";
				}
				echo "<br /> <br /> <br /> <br /> <br /><a href='ecrire_message.php'><input type='submit' class='valid' value='Ecrire message' /></a>";
			?>
		</div>
	</body>
</html>