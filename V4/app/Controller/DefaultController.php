<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 02/01/2017
 * Time: 17:01
 */
namespace Controller;
use Model\Entity\Comment;
use Model\Manager\ArticleManager;
use Model\Manager\CommentManager;
use Model\Manager\VideoManager;
use View\View;

class DefaultController
{
    public function home()
    {
        $articleManager = new ArticleManager();
        $videoManager = new VideoManager();
        $videos = null;
        $videoRoller = null;
        $videoSkate = null;
        $videoTrot = null;
        $messageArticle = null;
        $messageVideo = null;

        if(!empty($_GET['research'])){
            // je retourne les articles et videos contenant la recherche dans le titre
            $articles = $articleManager->findArticleByResearch($_GET['research']);
            $videos = $videoManager->findVideoByResearch($_GET['research']);
            // si pas de résultats => message
            if(empty($articles)){
                $messageArticle = "Pas d'articles correspondant, essayez une autre recherche";
            }
            else if(empty($videos)){
                $messageVideo = "Pas de videos correspondant, essayez une autre recherche";
            }
        }

        else{
            $roller = "Roller";
            $trot = "Trottinette";
            $skate = "Skate";

            //affichage des articles

            $articles = $articleManager->findAll();

            //affichage bar vidéos

            $videoRoller = $videoManager->findOneVideoByFamily($roller);
            $videoTrot = $videoManager->findOneVideoByFamily($trot);
            $videoSkate = $videoManager->findOneVideoByFamily($skate);
        }

        View::show("home.php", "Glisse Urbaine | Accueil", ["articles" => $articles,
                                                            "videoRoller" => $videoRoller,
                                                            "videoSkate" => $videoSkate,
                                                            "videoTrot" => $videoTrot,
                                                            "videos" => $videos,
                                                            "messageArticle" => $messageArticle,
                                                            "messageVideo" => $messageVideo]);
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

        $errors = [];
        $comment = new Comment();
        $commentManager = new CommentManager();
        if(!empty($_POST)){
            //attention aux XSS ici
            $author = strip_tags($_POST['author']);
            $email = strip_tags($_POST['email']);
            $content = htmlspecialchars($_POST['content']);

            //tous les champs sont requis
            if (empty($author) || empty($email) || empty($content)){
                $errors[] = "Veuillez remplir tous les champs.";
            }

            //email avec filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Votre email n'est pas valide";
            }
            if (empty($errors)){

                $comment->setAuthor($author);
                $comment->setEmail($email);
                $comment->setContent($content);
                $comment->setIdArticle($id);

                $commentManager->create($comment);
            }

        }
        $comments = $commentManager->findAllByIdArticle($id);

        //affiche la vue en lui passant le post
        View::show("article_details.php", $article->getTitle(), ["article" => $article,
                                                                 "comments" => $comments,
                                                                 "errors" => $errors]);
    }

    public function error404()
    {
        //envoie une entête 404 (pour notifier les clients que ça a foiré)
        header("HTTP/1.0 404 Not Found");
        View::show("errors/404.php", "Oups ! Perdu ?");
    }

    public function roller()
    {
        $roller = "Roller";

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
        $trottinette = "Trottinette";

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
        $skate = "Skate";

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

        $roller = "Roller";
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

        $trottinette = "Trottinette";
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

        $skate = "Skate";
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

        $errors = [];
        $comment = new Comment();
        $commentManager = new CommentManager();
        if(!empty($_POST)){
            //attention aux XSS ici
            $author = strip_tags($_POST['author']);
            $email = strip_tags($_POST['email']);
            $content = htmlspecialchars($_POST['content']);

            //tous les champs sont requis
            if (empty($author) || empty($email) || empty($content)){
                $errors[] = "Veuillez remplir tous les champs.";
            }

            //email avec filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors[] = "Votre email n'est pas valide";
            }
            if (empty($errors)){
                //on hydrate l'objet
                $comment->setAuthor($author);
                $comment->setEmail($email);
                $comment->setContent($content);
                $comment->setIdArticle($id);

                $commentManager->create($comment);
            }

        }
        $comments = $commentManager->findAllByIdVideo($id);

        //affiche la vue en lui passant le post
        View::show("video_details.php", $video->getTitle(), ["video" =>$video,
                                                             "comments" => $comments,
                                                             "errors" => $errors]);
    }

    public function contact()
    {

        $errors = []; // on crée une vérif de champs
        if(empty($_POST['name'])){// on verifie l'existence du champ et d'un contenu
            $errors ['name'] = "vous n'avez pas renseigné votre nom";
        }
        if((empty($_POST['email'])) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {// on verifie existence de la clé
            $errors ['email'] = "vous n'avez pas renseigné votre email";
        }
        if(empty($_POST['message'])) {
            $errors ['message'] = "vous n'avez pas renseigné votre message";
        }
        //On check les infos transmises lors de la validation
        if(!empty($errors)){ // si erreur on renvoie vers la page précédente
            //var_dump($errors);
        }

        else{
            $_SESSION['success'] = 1;
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'FROM:' . htmlspecialchars($_POST['email']);
            $to = 'postmaster@glisseurbaine.fr'; // Insérer votre adresse email ICI
            $subject = 'Message envoyé par ' . htmlspecialchars($_POST['name']) .' - <i>' . htmlspecialchars($_POST['email']) .'</i>';
            $message_content = '<table>
                              <tr>
                              <td><b>Emetteur du message:</b></td>
                              </tr>
                              <tr>
                              <td>'. $subject . '</td>
                              </tr>
                              <tr>
                              <td><b>Contenu du message:</b></td>
                              </tr>
                              <tr>
                              <td>'. htmlspecialchars($_POST['message']) .'</td>
                              </tr>
                              </table>';
            mail($to, $subject, $message_content, $headers);
        }
        View::show("contact.php", "Glisse Urbaine | Contact", ["errors" => $errors]);
    }
}