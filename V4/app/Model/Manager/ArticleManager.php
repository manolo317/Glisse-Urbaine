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

        $sql = "SELECT id, title, family, resume, image, content, date_created
                FROM article 
                WHERE id NOT IN (8, 9, 10, 11)
                ORDER BY date_created DESC;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Article');

        return $results;
    }
}