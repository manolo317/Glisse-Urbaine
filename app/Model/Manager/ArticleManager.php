<?php

/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 03/01/2017
 * Time: 09:17
 */

namespace Model\Manager;

use Model\Db;
use Model\Entity\Article;
use PDO;

class ArticleManager
{
    public function findAll()
    {

        $sql = "SELECT id, title, family, resume, image, content, dateCreated
                FROM articles 
                WHERE id NOT IN (8, 9, 10, 11)
                ORDER BY dateCreated DESC
                LIMIT 6;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Article');

        return $results;
    }

    public function findOneById($id)
    {
        $sql = "SELECT id, title, family, resume, image, content, dateCreated
                FROM articles WHERE id= :id";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":id", $id);//donne une valeur en paramètre
        $stmt->execute();
        // instancie un objet
        $result = $stmt->fetchObject('\Model\Entity\Article');

        return $result;
    }
    public function findAllByFamily($family)
    {

        $sql = "SELECT id, title, family, resume, image, content, dateCreated
                FROM articles 
                WHERE id NOT IN (8, 9, 10, 11)
                AND family = :family
                ORDER BY dateCreated DESC;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":family", $family);//donne une valeur en paramètre
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Article');

        return $results;
    }

    public function findArticleByResearch($research)
    {
        $sql = "SELECT id, title, family, resume, image, content, dateCreated
                FROM articles
                WHERE title LIKE :research AND id NOT IN (8, 9, 10, 11)
                OR family LIKE :research AND id NOT IN (8, 9, 10, 11)
                OR resume LIKE :research AND id NOT IN (8, 9, 10, 11)
                OR content LIKE :research AND id NOT IN (8, 9, 10, 11)
                ORDER BY dateCreated DESC;";

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":research", '%'.$research.'%');//donne une valeur en paramètre
        $stmt->execute();
        // instancie un objet
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,'\Model\Entity\Article');

        return $result;
    }
}