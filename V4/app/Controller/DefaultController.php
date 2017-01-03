<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/01/2017
 * Time: 17:01
 */
namespace Controller;
use Model\Manager\ArticleManager;
use Model\Manager\VideoManager;
use View\View;

class DefaultController
{
    public function home()
    {
        $roller = "roller";
        $trot = "trottinette";
        $skate = "skate";

        //affichage des articles
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();

        //affichage bar vidéos
        $videoManager = new VideoManager();
        $videoRoller = $videoManager->findOneVideoByFamily($roller);
        $videoTrot = $videoManager->findOneVideoByFamily($trot);
        $videoSkate = $videoManager->findOneVideoByFamily($skate);


        View::show("home.php", "Glisse Urbaine | Accueil", ["articles" => $articles,
                                                            "videoRoller" => $videoRoller,
                                                            "videoSkate" => $videoSkate,
                                                            "videoTrot" => $videoTrot]);
    }
}