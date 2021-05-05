<?php

namespace App\Model\Entity;

class Post 
{
  protected $id;
  protected $title;
  protected $content;
  protected $creationDate;
  protected $user;

  const AUTEUR_INVALIDE = 1;
  const CONTENU_INVALIDE = 2;

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
      
  public function setId($id)
  {
      $this->id = (int)$id;
  }

  public function setTitle($title)
  {
      if(!is_string($title) || empty($title)) {
        $this->erreurs[] = self::AUTEUR_INVALIDE;
      } else {
        $this->title = $title;
      }
  }

  public function setContent($content)
  {
      if(!is_string($content) || empty($content)) {
        $this->erreurs[] = self::CONTENU_INVALIDE;
      } else {
        $this->content = $content;
      }
      
  }

  public function setCreationDate(\DateTime $creationDate)
  {
      $this->creationDate = $creationDate;
  }

  public function setUser($user)
  {
      $this->user = $user;
  }


}