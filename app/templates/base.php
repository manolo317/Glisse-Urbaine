<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/01/2017
 * Time: 17:07
 */
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Glisse urbaine: le site de tous ceux qui aiment le goudron: Roller, Skateboard, Trottinettes...</title>
        <meta name="description" content="L'actualité des sports de glisse urbain: Roller, Skateboard et Trotinette. Des dossiers pour bien choisir son matériel, découvrir une nouvelle pratique, pour monter sa trottinette freestyle, ou pour voir le dernier world first en vidéo!"/>
        <?php include("app/templates/head.php"); ?>
    <body>


    <?php include("app/templates/entete.php"); ?>
    <?php include("app/templates/menu.php"); ?>


    <div id="conteneur">
        <?php include("app/templates/$page.php") ?>

    <?php include("app/templates/pied.php"); ?>
    </div>
    </body>
</html>
