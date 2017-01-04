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

    public function articleDetails()
    {
        $articleManager = new ArticleManager();
        //créé l'article dont l'Id est dans l'URL
        $id = $_GET['id'];
        $article = $articleManager->findOneById($id);

        //si l'article n'existe pas erreur 404
        if(empty($article)){
            return $this->error404();
        }
        //affiche la vue en lui passant le post
        View::show("article_details.php", $article->getTitle(), ["article" =>$article]);
    }

    public function error404()
    {
        //envoie une entête 404 (pour notifier les clients que ça a foiré)
        header("HTTP/1.0 404 Not Found");
        View::show("errors/404.php", "Oups ! Perdu ?");
    }

    public function roller()
    {
        $roller = "roller";

        //affichage des articles
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAllByFamily($roller);

        //affichage bar vidéos
        $videoManager = new VideoManager();
        $videosRoller = $videoManager->findThreeVideosByFamily($roller);

        View::show("roller.php", "Glisse Urbaine | Roller", ["articles" => $articles,
            "videosRoller" => $videosRoller]);
    }

    public function trottinette()
    {
        $trottinette = "trottinette";

        //affichage des articles
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAllByFamily($trottinette);

        //affichage bar vidéos
        $videoManager = new VideoManager();
        $videosTrot = $videoManager->findThreeVideosByFamily($trottinette);

        View::show("trottinette.php", "Glisse Urbaine | Trottinette", ["articles" => $articles,
            "videosTrot" => $videosTrot]);
    }

    public function skate()
    {
        $skate = "skate";

        //affichage des articles
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAllByFamily($skate);

        //affichage bar vidéos
        $videoManager = new VideoManager();
        $videosSkate = $videoManager->findThreeVideosByFamily($skate);

        View::show("skate.php", "Glisse Urbaine | Trottinette", ["articles" => $articles,
            "videosSkate" => $videosSkate]);
    }

    public function videos()
    {
        // pagination
        if(empty($_GET['page'])) {
            $currentPage = 1;
            $_GET['page'] = 1;
        }
        else {
            $currentPage = $_GET['page'];
        }
        //affichage des vidéos
        $videoManager = new VideoManager();
        $videos = $videoManager->findAllVideosPage($currentPage);
        $count = $videoManager->countAll();


        View::show("videos.php", "Glisse Urbaine | Videos", ["videos" => $videos,
                                                             "currentPage" => $currentPage,
                                                             "videosCount" => $count]);
    }

    public function videosRoller()
    {
        // pagination
        if(empty($_GET['page'])) {
            $currentPage = 1;
            $_GET['page'] = 1;
        }
        else {
            $currentPage = $_GET['page'];
        }

        $roller = "roller";
        //affichage des vidéos
        $videoManager = new VideoManager();
        $videos = $videoManager->findAllVideosByFamily($roller, $currentPage);
        $count = $videoManager->countAllByFamily($roller);


        View::show("videos_roller.php", "Glisse Urbaine | Videos Roller", ["videos" => $videos,
                                                                           "currentPage" => $currentPage,
                                                                           "videosCount" => $count]);
    }

    public function videosTrot()
    {

        // pagination
        if(empty($_GET['page'])) {
            $currentPage = 1;
            $_GET['page'] = 1;
        }
        else {
            $currentPage = $_GET['page'];
        }

        $trottinette = "trottinette";
        //affichage des vidéos
        $videoManager = new VideoManager();
        $videos = $videoManager->findAllVideosByFamily($trottinette, $currentPage);
        $count = $videoManager->countAllByFamily($trottinette);

        View::show("videos_trottinette.php", "Glisse Urbaine | Videos Trottinette", ["videos" => $videos,
                                                                                     "currentPage" => $currentPage,
                                                                                     "videosCount" => $count]);
    }

    public function videosSkate()
    {
        // pagination
        if(empty($_GET['page'])) {
            $currentPage = 1;
            $_GET['page'] = 1;
        }
        else {
            $currentPage = $_GET['page'];
        }

        $skate = "skate";
        //affichage des vidéos
        $videoManager = new VideoManager();
        $videos = $videoManager->findAllVideosByFamily($skate, $currentPage);
        $count = $videoManager->countAllByFamily($skate);

        View::show("videos_skate.php", "Glisse Urbaine | Videos Skateboard", ["videos" => $videos,
                                                                              "currentPage" => $currentPage,
                                                                              "videosCount" => $count]);
    }

    public function videoDetails()
    {
        $videoManager = new VideoManager();
        //créé la video dont l'Id est dans l'URL
        $id = $_GET['id'];
        $video = $videoManager->findOneById($id);

        //si l'article n'existe pas erreur 404
        if(empty($video)){
            return $this->error404();
        }
        //affiche la vue en lui passant le post
        View::show("video_details.php", $video->getTitle(), ["video" =>$video]);
    }
}