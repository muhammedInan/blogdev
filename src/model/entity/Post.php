<?php

namespace App\Model\Entity;

use hydratation;

class Post 
{
  protected $id;
  protected $title;
  protected $content;
  protected $creationDate;
  protected $user;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

  

  use hydratation;

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
      if(!is_string($title) || empty($title)) {
        $this->erreurs[] = self::AUTEUR_INVALIDE;
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
      if(!is_string($content) || empty($content)) {
        $this->erreurs[] = self::CONTENU_INVALIDE;
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
