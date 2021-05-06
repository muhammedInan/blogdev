<?php

namespace App\Model\Entity;

abstract class Model
{

    public function hydrate($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set' . ucfirst($attribut);

            if (is_callable($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->hydrate($valeurs);
        }
    }
}
