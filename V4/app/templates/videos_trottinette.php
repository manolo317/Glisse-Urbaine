<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 04/01/2017
 * Time: 14:58
 */
?>

<div id="corps">
    <h3 class="titreSecondTrot">Vidéos Trottinette freestyle</h3>
    <img src="<?= BASE_URL ?>/public/img/photovideotrot.png" alt="trotirider" class="photovideo"/>
    <br/>
    <div class="lien-page">
        <!-- Pagination -->
        <span>
            <?php if($currentPage != 1) {
                echo '<a href="';
                echo "?page=";
                echo $currentPage-1;
                echo '">&laquo;</a>  ';
            }
            $nbPages = ceil($videosCount/10);
            $ii = 1;
            for ($ii; $ii <= $nbPages; $ii++) {
                echo '<a';
                if ($ii == $currentPage) {
                    echo 'class="active"';
                }
                echo ' href="';
                echo "?page=";
                echo $ii;

                echo '">';
                echo $ii;
                echo '</a> ';
            }
            if($currentPage != $nbPages) {
                echo '<a href="';
                echo "?page=";
                echo $currentPage+1;
                echo '">&raquo;</a>  ';
                //class="active" pour page active
            }
            ?>
        </span>
    </div>
    <ul>
        <div id="lignemenu"></div>
        <?php foreach($videos as $video): ?>
            <li class="video">
                <a href="<?= BASE_URL ?>video-details?id=<?= $video->getId() ?>" title="voir la vidéo"><img src="<?= BASE_URL ?>/public/img/videoTrottinette.jpg" alt="logo video trottinette" class="photoarticle"/><br/><br/><div class="imagehover"><iframe  class="videomenu" width="154" height="80" src="<?= $video->getUrl() ?>" frameborder="0" allowfullscreen></iframe><img src="<?= BASE_URL ?>/public/img/fond-noir-video.jpg" class="roll2" /><span> <?= $video->getResume() ?></span></div></a>
            </li>
            <div id="lignemenu"></div>
        <?php endforeach; ?>
    </ul>
    <div class="lien-page">
        <!-- Pagination -->
        <span>
            <?php if($currentPage != 1) {
                echo '<a href="';
                echo "?page=";
                echo $currentPage-1;
                echo '">&laquo;</a>  ';
            }
            $nbPages = ceil($videosCount/10);
            $ii = 1;
            for ($ii; $ii <= $nbPages; $ii++) {
                echo '<a';
                if ($ii == $currentPage) {
                    echo 'class="active"';
                }
                echo ' href="';
                echo "?page=";
                echo $ii;

                echo '">';
                echo $ii;
                echo '</a> ';
            }
            if($currentPage != $nbPages) {
                echo '<a href="';
                echo "?page=";
                echo $currentPage+1;
                echo '">&raquo;</a>  ';
                //class="active" pour page active
            }
            ?>
        </span>
    </div>
</div>
<script src="<?= BASE_URL ?>/public/js/jquery-1.10.2.min.js"></script>
<script src="<?= BASE_URL ?>/public/js/animhovervideo.js"></script>
