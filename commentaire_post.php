<?php
// Connexion à la base de données
try
{
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=glisseurmanu0786.mysql.db;dbname=glisseurmanu0786;charset=utf8', 'glisseurmanu0786', 'Manu0786', $pdo_options);
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
if(!empty($_POST['auteur']) AND !empty($_POST['email'])AND !empty($_POST['commentaire']))
{
 
 // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO commentaires (article, auteur, email, commentaire, date_commentaire)
VALUES(:article, :auteur, :email, :commentaire, NOW())') or die(print_r($bdd -> getMessage()));
    $req->execute(array(
                         'article' => htmlspecialchars($_POST['url']),
                         'auteur' => htmlspecialchars($_POST['auteur']),
                         'email' => htmlspecialchars($_POST['email']),
                         'commentaire' => htmlspecialchars($_POST['commentaire'])
                         ));
              // Redirection du visiteur vers la page des commentaires
              header('Location:' . $_POST['url']);
}
    ?>
    </body>
</html>
