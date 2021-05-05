<?php

namespace Model\Entity;

class User {

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
}