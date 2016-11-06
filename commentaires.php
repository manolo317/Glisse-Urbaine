<div class="commentaires">
	<?php  $url=$_SERVER['REQUEST_URI']; ?>	
	<h3>Laisse ton commentaire:</h3>
	<p>Votre adresse de messagerie ne sera publiée. Les champs obligatoires sont indiqués avec *<br/><br/></p>	
	<form method="post" action="commentaire_post.php">
		<p><label for="Auteur"><strong>Nom* :</strong></label><br/><input type="text" id="Auteur" name="auteur" required/></p><br/>
		<p><label for="commentaire"><strong>Commentaire* :</strong></label><br/><textarea name="commentaire" id="commentaire" placeholder="votre message ici" rows="10" cols="20" required></textarea></p><br/>
		<p><label for="email"><strong>Adresse de messagerie* :</strong></label><br/><input type="email" id="email" name="email" required/></p><br/>
		<input type="text" id="url" name="url" value="<?php echo($url);?>" hidden/>
		<input type="submit" value="Envoyer"/>
	</form>	
	<h3>Les commentaires:</h3>
	
		<ul>
		<?php
			// Connexion à la base de données
			try
			{
			    $bdd = new PDO('mysql:host=glisseurmanu0786.mysql.db;dbname=glisseurmanu0786;charset=utf8', 'glisseurmanu0786', 'Manu0786');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
			
			$req = $bdd->query('SELECT article, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire FROM commentaires WHERE article= "'.$url.'" ORDER BY date_commentaire');
			while($donnees = $req->fetch())
			{
			?>
			<li>
				<p class="commentaire-auteur"><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong>
				</p>
				<p>
					<?php 
					//on affiche le contenu du billet
					echo nl2br(htmlspecialchars($donnees['commentaire'])); 
					?> 	
				</p>
				<p class="commentaire-date">le <em><?php echo htmlspecialchars($donnees['date_commentaire']); ?> </em></p>
			</li>
				<?php
					}
				 //fin de la boucle des billets
				$req->closeCursor();
					?>
				
		</ul>					
</div>	