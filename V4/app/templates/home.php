<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/01/2017
 * Time: 17:55
 */
?>
<?php include("diapo2.php"); ?>
<div id="barmenuppal">
    <h2 class="hidden"> Liste des dernières actualités.</h2>
    <ul>
        <?php foreach($articles as $article): ?>
            <li>
                <div class="border">
                    <h3 class="titreSecond"><a href="#"><?= $article->getTitle() ?></a></h3>
                    <div class="content clearfix">
                        <a href="#" class="imagehover">
                            <img src="<?= BASE_URL ?>public/img/<?= $article->getImage() ?>" alt="" class="photoarticle"/>
                            <img src="<?= BASE_URL ?>/public/img/fond_noir.png" class="roll" />
                        </a>
                        <p><?= $article->getResume() ?></p>

                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="barmenuvideo">
    <h3 class="titreSecond"><a href="videos.php">Vidéos +</a></h3>
    <div class="video-box">
        <a href="#" class="logo-video"><img src="<?= BASE_URL ?>public/img/videotrottinette.jpg"  alt="logo video trottinette"/></a>
        <iframe class="minivideo" src="<?= $videoTrot->getUrl() ?>" frameborder="0" allowfullscreen></iframe>
        <p>
            <br/>
            <?= $videoTrot->getResume() ?>
        </p>
    </div>
    <div id="lignemenu"></div>
    <br>
    <br>
    <div class="video-box">
        <a href="#"><img src="<?= BASE_URL ?>public/img/videoroller.jpg" alt="logo video roller"/></a>
        <iframe class="minivideo" src="<?= $videoRoller->getUrl() ?>" frameborder="0" allowfullscreen></iframe>
        <p>
            <br>
            <?= $videoRoller->getResume() ?>
        </p>
    </div>
    <div id="lignemenu"></div>
    <br>
    <br>
    <div class="video-box">
        <a href="videoskate.php"><img src="<?= BASE_URL ?>public/img/videoskate.jpg" alt="logo video skate"/></a>
        <iframe class="minivideo" src="<?= $videoSkate->getUrl() ?>" frameborder="0" allowfullscreen></iframe>
        <br>
        <p>
            <br>
            <?= $videoSkate->getResume() ?>
        </p>
    </div>
    <div id="lignemenu"></div>
    <br>

    <div id="fb-video">
        <div id="fb-root"></div><script src="http://connect.facebook.net/fr_FR/all.js#xfbml=1"></script><fb:like-box href="https://www.facebook.com/pages/Glisseurbainefr/140816476093436" width="300" show_faces="true" border_color="#ccc" stream="false" header="true"></fb:like-box>
    </div>
<br>
</div>
