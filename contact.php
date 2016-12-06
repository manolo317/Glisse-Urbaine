<?php
  session_start();
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Contact</title>
		<meta name="description" content="L'actualité des sports de glisse urbain: Roller, Skateboard et Trotinette. Des dossiers pour bien choisir son matériel, découvrir une nouvelle pratique, pour monter sa trottinette freestyle, ou pour voir le dernier world first en vidéo!"/>
	<?php include("head.php"); ?>
	<body>
	
	
	<?php include("entete.php"); ?>
	<?php include("menu.php"); ?>

		<div id="conteneur">
			<div id="corps" >
				<h2 class="contact">Contact par mail :</h2>
				<p>Les champs obligatoires sont indiqués avec *</p>
				<br>
				<?php if(array_key_exists('errors',$_SESSION)): ?>
					<?= implode('<br>', $_SESSION['errors']); ?>
			    <?php endif; ?>
			    <?php if(array_key_exists('success',$_SESSION)): ?>
				  	<p>Votre email à bien été transmis !</p>
				<?php endif; ?>
				<form action="contact_send.php" method="post">
					<div>
					<label class="contact" for="inputname"><strong>Nom* :</strong></label>
						<input required type="text" name="name" id="inputname" value="<?= isset($_SESSION['inputs']['name'])? $_SESSION['inputs']['name'] : ''; ?>">
					</div>
					<br>
					<div>
					<label class="contact" for="inputemail"><strong>Adresse de messagerie* :</strong></label>
						<input required type="email" name="email" id="inputemail" value="<?= isset($_SESSION['inputs']['email'])? $_SESSION['inputs']['email'] : ''; ?>">
					</div>
					<br>
					<div>
					<label class="contact" for="inputmessage"><strong>Votre message* :</strong></label>
					<textarea required id="inputmessage" name="message" rows="10" cols="23"><?= isset($_SESSION['inputs']['message'])? $_SESSION['inputs']['message'] : ''; ?></textarea>
					</div>
				
				<br>
				  	<button type='submit'>Envoyer</button>
				  </form>
			</div>
	<?php include("pied.php"); ?>
		</div>
	</body>
</html>
<?php
unset($_SESSION['inputs']); // on nettoie les données précédentes
  unset($_SESSION['success']);
  unset($_SESSION['errors']);

