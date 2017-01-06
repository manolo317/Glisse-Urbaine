<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 05/01/2017
 * Time: 10:04
 */
//var_dump($comments);

?>
<div class="commentaires">
    <h3>Laisse ton commentaire:</h3>
    <p>Votre adresse de messagerie ne sera publiée. Les champs obligatoires sont indiqués avec *<br/><br/></p>
    <form method="post">
        <p><label for="author"><strong>Nom* :</strong></label><br/><input type="text" id="author" name="author" required/></p><br/>
        <p><label for="content"><strong>Commentaire* :</strong></label><br/><textarea name="content" id="content" placeholder="votre message ici" rows="10" cols="20" required></textarea></p><br/>
        <p><label for="email"><strong>Adresse de messagerie* :</strong></label><br/><input type="email" id="email" name="email" required/></p><br/>

        <input type="submit" value="Envoyer"/>
    </form>
    <?php foreach($errors as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
    <?php if(!empty($comments)){
        echo '<h3>Les commentaires:</h3>

       <ul>'; }
    ?>
        <?php foreach($comments as $comment): ?>

        <li>
            <p class="commentaire-auteur"><strong><?= $comment->getAuthor() ?></strong>
            </p>
            <p>

            <!--on affiche le contenu du billet-->
            <?= $comment->getContent() ?>
            </p>
            <p class="commentaire-date">le <em><?= $comment->getDatePosted() ?></em></p>
        </li>
        <?php endforeach; ?>

    </ul>
</div>
