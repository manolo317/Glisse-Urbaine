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
if(!empty($_POST['texte']) AND !empty($_POST['auteur'])AND !empty($_POST['title']))
{
 
 // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO article (texte, auteur, title, date_creation)
VALUES(:texte, :auteur, :title, NOW())') or die(print_r($bdd -> getMessage()));
    $req->execute(array(
                         'texte' => ($_POST['texte']),
                         'auteur' => htmlspecialchars($_POST['auteur']),
                         'title' => htmlspecialchars($_POST['title'])
                         ));
              // Redirection du visiteur vers la page des commentaires
              header('Location:indexTiny.html');
}
    ?>
    </body>
</html>
