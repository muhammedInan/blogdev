<?php

namespace App\Model\Entity;



class Post extends Model
{

  const INVALID_AUTHOR = 1;
  const INVALID_CONTENT = 2;

  protected $id;
  protected $title;
  protected $content;
  protected $creationDate;
  protected $user;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = (int)$id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    if (!is_string($title) || empty($title)) {
      $this->erreurs[] = self::INVALID_AUTHOR;
    } else {
      $this->title = $title;
    }
  }

  public function getContent()
  {
    return $this->content;
  }

  public function setContent($content)
  {
    if (!is_string($content) || empty($content)) {
      $this->erreurs[] = self::INVALID_CONTENT;
    } else {
      $this->content = $content;
    }
  }

  public function getCreationDate()
  {
    return $this->creationDate;
  }

  public function setCreationDate(\DateTime $creationDate)
  {
    $this->creationDate = $creationDate;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setUser($user)
  {
    $this->user = $user;
  }
}
