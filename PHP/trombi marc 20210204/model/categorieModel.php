<?php

namespace Model;

class CategorieModel
{
    private $id;
    private $nom;

    /**
     * Fonction qui permet de remplir mon objet à partir d'un tableau de données
     * 
     * @param array $resultat
     */
    public function fromArray(array $resultat): void
    {
        $this->id = $resultat["id_categorie"];
        $this->nom = $resultat["nom"];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}
