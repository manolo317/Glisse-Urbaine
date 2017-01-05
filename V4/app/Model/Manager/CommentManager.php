<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 05/01/2017
 * Time: 09:29
 */

namespace Model\Manager;
use Model\Db;
use Model\Entity\Comment;
use PDO;

class CommentManager
{
    public function findAllByIdArticle($idArticle)
    {
        $sql = "SELECT c.id, c.id_article, c.author, c.email, c.content, c.date_posted
                FROM comments c
                INNER JOIN article a
                ON c.id_article = a.id
                WHERE a.id= :id;";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":id", $idArticle);//donne une valeur en paramètre
        $stmt->execute();
        // instancie un objet
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\Entity\Comment');

        return $result;
    }

    public function findAllByIdVideo($idVideo)
    {
        $sql = "SELECT c.id, c.id_article, c.author, c.email, c.content, c.date_posted
                FROM comments c
                INNER JOIN videos v
                ON c.id_article = v.id
                WHERE v.id= :id;";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":id", $idVideo);//donne une valeur en paramètre
        $stmt->execute();
        // instancie un objet
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\Entity\Comment');

        return $result;
    }

    public function create(Comment $comment)
    {
        $sql = "INSERT INTO comments(id_article, author, email, content, date_posted) 
                                    VALUES (:id_article, :author, :email, :content, NOW());";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":id_article", $comment->getIdArticle());
        $stmt->bindValue(":author", $comment->getAuthor());
        $stmt->bindValue(":email", $comment->getEmail());
        $stmt->bindValue(":content", $comment->getContent());

        if($stmt->execute()){
            $comment->setId($dbh->lastInsertId()); //je récupère l'id du movie que je viens de créer
            return $comment;
        }
        else{
            return false;
        }

    }
}