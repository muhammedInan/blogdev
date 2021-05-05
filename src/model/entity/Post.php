<?php

namespace App\Model\Entity;

class Post 
{
  protected $id;
  protected $title;
  protected $content;
  protected $creationDate;
  protected $user;

  public function __construct($valeurs = [])
  {
      if (!empty($valeurs)) {
          $this->hydrate($valeurs);
      }
  }

  public function hydrate($donnees)
  {
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

  public function getTitle()
  {
    return $this->title;
  }

  public function getContent()
  {
    return $this->content;
  }

  public function getCreationDate()
  {
    return $this->creationDate;
  }

  public function getUser()
  {
      return $this->user;
  }
      
  
}