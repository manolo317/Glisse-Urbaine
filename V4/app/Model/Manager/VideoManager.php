<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 03/01/2017
 * Time: 11:41
 */

namespace Model\Manager;
use Model\Db;
use Model\Entity\Video;
use PDO;

class VideoManager
{
    public function findAllVideos()
    {

        $sql = "SELECT id, title, url, family, resume, content, date_posted
                FROM videos 
                ORDER BY date_created DESC;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Video');

        return $results;
    }

    public function findAllVideosByFamily($family)
    {

        $sql = "SELECT id, title, url, family, resume, content, date_posted
                FROM videos 
                WHERE family = :family
                ORDER BY date_posted DESC;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":family", $family);//donne une valeur en paramètre
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Video');

        return $results;
    }

    public function findThreeVideosByFamily($family)
    {

        $sql = "SELECT id, title, url, family, resume, content, date_posted
                FROM videos 
                WHERE family = :family
                ORDER BY date_posted DESC
                LIMIT 3;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":family", $family);//donne une valeur en paramètre
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, '\Model\Entity\Video');

        return $results;
    }

    public function findOneVideoByFamily($family)
    {

        $sql = "SELECT id, title, url, family, resume, content, date_posted
                FROM videos 
                WHERE family = :family
                ORDER BY date_posted DESC
                LIMIT 1;";

        $dbh = Db::getDbh();

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":family", $family);//donne une valeur en paramètre
        $stmt->execute();
        $result = $stmt->fetchObject('\Model\Entity\Video');

        return $result;
    }
}