<?php

namespace Model;

class ContenuModel
{
    private $id;
    private $categorie; // CategorieModel
    private $profil; // ProfilModel
    private $nom;
    private $description;

    public function __construct(ProfilModel $profil)
    {
        // On remplit le profil avec un objet ProfilModel
        $this->profil = $profil;
    }

    /**
     * Fonction qui permet de remplir mon objet à partir d'un tableau de données
     * 
     * @param array $resultat
     */
    public function fromArray(array $resultat): void
    {
        $this->id = $resultat["id_contenu"];
        //$this->profil = $resultat["id_user"];
        $this->nom = $resultat["nom"];
        $this->description = $resultat["description"];

        // On remplit la catégorie avec un ohjet CategorieModel
        $categorie = new CategorieModel;
        $categorie->fromArray(
            [
                "id_categorie" => $resultat["id_categorie"],
                "nom" => $resultat["cat"]
            ]
        );
        $this->categorie = $categorie;
    }

    /*
    # MCD !

    ----------------                               ----------------
    | contenu      |                               | categorie    |
    ----------------                               ----------------
    | id_contenu   |                               | id_categorie |
    | nom          |1,1 ------( possède )-------0,N| nom          |
    | description  |                               ----------------
    ----------------
           |
           |                                        ------------
           -----------------------------------------| user     |
                                                    ------------
                                                    | id       |
                                                    | nom      |
                                                    | prenom   |
                                                    | ...      |
                                                    ------------

    */

    public function getId(): string
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategorie(): CategorieModel
    {
        return $this->categorie;
    }

    public function getProfil(): ProfilModel
    {
        return $this->profil;
    }
}
