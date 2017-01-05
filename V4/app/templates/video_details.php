<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 04/01/2017
 * Time: 15:19
 */
?>
<div id="corps">
    <h2 id="titre"><?= $video->getTitle() ?></h2>
    <br/>
    <ul>
        <li>
            <p>
                <?= $video->getContent() ?>
            </p>
            <br/>
            <iframe class="video-large" width="854" height="480" src="<?= $video->getUrl() ?>" frameborder="0" allowfullscreen></iframe>
            <br/>
        </li>
    </ul>
    <?php include("app/templates/social.php"); ?>
    <?php include("app/templates/comments.php"); ?>
</div>

