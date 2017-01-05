<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 04/01/2017
 * Time: 14:31
 */
?>
<div id="corps">
    <h2 id="titre">Vidéos </h2>
    <div id="icon-box">
        <div class="iconhover">
            <a href="<?= BASE_URL ?>videos-roller"/>
            <img src="<?= BASE_URL ?>public/img/icon-roller.png" height="80" width="80" id="icon-roller"/>
            <img src="<?= BASE_URL ?>public/img/icon-roller-hover.png" height="80" width="80" class="icon-roller-hover"/>
            </a>
        </div>

        <div class="iconhover">
            <a href="<?= BASE_URL ?>videos-trottinette"/>
            <img src="<?= BASE_URL ?>public/img/icon-trot.png" height="80" width="80" id="icon-trot"/>
            <img src="<?= BASE_URL ?>public/img/icon-trot-hover.png" height="80" width="80" class="icon-trot-hover"/>
            </a>
        </div>

        <div class="iconhover">
            <a href="<?= BASE_URL ?>videos-skate"/>
            <img src="<?= BASE_URL ?>public/img/icon-skate.png" height="80" width="80" id="icon-skate"/>
            <img src="<?= BASE_URL ?>public/img/icon-skate-hover.png" height="80" width="80" class="icon-skate-hover"/>
            </a>
        </div>

    </div>
    <div id="lien-icone"></div>
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
            <a href="<?= BASE_URL ?>video-details?id=<?= $video->getId() ?>" title="voir la vidéo"><img src="<?= BASE_URL ?>public/img/video<?= $video->getFamily() ?>.jpg" alt="logo video <?= $video->getFamily() ?>" class="photoarticle"/><br/><br/><div class="imagehover"><iframe class="videomenu" width="154" height="80" src="<?= $video->getUrl() ?>" frameborder="0" allowfullscreen></iframe><img src="<?= BASE_URL ?>public/img/fond-noir-video.jpg" class="roll2" /><span> <?= $video->getResume() ?></span></div></a>
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


<script src="<?= BASE_URL ?>/public/js/animhovervideo.js"></script>
<script src="<?= BASE_URL ?>/public/js/icon-hover.js"></script>