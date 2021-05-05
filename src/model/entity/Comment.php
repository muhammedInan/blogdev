<?php

namespace App\Model\Entity;

class Comment {
    
    protected $id;
    protected $postId;
    protected $author;
    protected $comment;
    protected $commentDate;
    protected $published;


    public function __construct($valeurs = []){

        if(!empty($valeurs)){
            $this->hydrate($valeurs);
        }
    }

    public function hydrate($donnees){
        foreach ($donnees as $attribut => $valeur){
        $methode = 'set' . ucfirst($attribut);
        
        if (is_callable($this, $methode)) {
            $this->$methode($valeur);
        }
     }

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int)$id;
    }

    public function getPostId()
    {
        return $this->postId;
    }

    public function setPostId($postId)
    {
        $this->postId = $postId;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getCommentDate()
    {
        return $this->commentDate;
    }

    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published;
    }



}