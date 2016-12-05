<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>test article</title>
		<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
		<meta name="description" content="L'actualité des sports de glisse urbain: Roller, Skateboard et Trotinette. Des dossiers pour bien choisir son matériel, découvrir une nouvelle pratique, pour monter sa trottinette freestyle, ou pour voir le dernier world first en vidéo!"/>
	<?php include("head.php"); ?>
	<body>
	
	
	<?php include("entete.php"); ?>
	<?php include("menu.php"); ?>
	<div id="corps">
		<?php
			// Connexion à la base de données
			try
			{
			    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    			$bdd = new PDO('mysql:host=localhost;dbname=gu;charset=utf8', 'root', 'moi0786', $pdo_options);
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
			
			$req = $bdd->query('SELECT texte, auteur, title, date_creation FROM article WHERE id=11');
			while($donnees = $req->fetch())
			{
			?>
			
				<p><strong><?php echo htmlspecialchars($donnees['title']); ?></strong>
				</p>
				<p>
					<?php 
					//on affiche le contenu du billet
					echo($donnees['texte']); 
					?> 	
				</p>
				<p>le <em><?php echo($donnees['date_creation']); ?> </em></p>
				<p>Par <?php echo($donnees['auteur']); ?></p>
			
				<?php
					}
				 //fin de la boucle des billets
				$req->closeCursor();
					?>
	</div>
	<?php include("pied.php"); ?>
		</div>
	</body>
</html>