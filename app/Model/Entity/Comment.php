<?php
/**
 * Created by PhpStorm.
 * User: Emmanuel
 * Date: 05/01/2017
 * Time: 09:27
 */

namespace Model\Entity;


class Comment
{
    private $id;
    private $idArticle;
    private $author;
    private $email;
    private $content;
    private $datePosted;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }

    /**
     * @param mixed $idArticle
     */
    public function setIdArticle($idArticle)
    {
        $this->idArticle = $idArticle;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getDatePosted()
    {
        return $this->datePosted;
    }

    /**
     * @param mixed $datePosted
     */
    public function setDatePosted($datePosted)
    {
        $this->datePosted = $datePosted;
    }


}