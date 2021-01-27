<?php

class Article
{
    public $id;
    public $img;
    public $_date;
    public $titre;
    public $nom_cat;
    public $id_cat;
    public $prenom;
    public $nom;
    public $contenu;
    public $identifiant_user;

    //FONCTION AUTO D'ENTRER QUI VERIFIE SI L'ID DE L'ARTICLE EST NON NULL
    public function __construct($bdd, $id = null)
    {
        $this->id = $id;
        if ($this->id !== null) {
            $this->fetch($bdd);
        };
    }
    // REMPLIE TOUTE LES VARIABLES DE L'ARTICLE SELECTIONNE
    public function fetch($bdd)
    {
        $id = $this->id;
        $article = $bdd->query('SELECT * FROM article a INNER JOIN utilisateur u ON u.identifiant_user=a.identifiant_user INNER JOIN categories c ON a.id_cat=c.id_cat WHERE   id_article="' . $id . '" ');
        while ($colonne = $article->fetch()) {
            $this->id_cat = $colonne["id_cat"];
            $this->titre = $colonne["titre"];
            $this->img = $colonne["img"];
            $this->_date = $colonne["_date"];
            $this->nom = $colonne["nom"];
            $this->prenom = $colonne["prenom"];
            $this->nom_cat = $colonne["nom_cat"];
            $this->contenu = $colonne["contenu"];
            $this->identifiant_user = $colonne["identifiant_user"];
        };
    }
    
    //MODIFIE LES CATEGORIES DE L'ARTICLE DIRECTEMENT DANS LA BDDD
    public function update($bdd)
    {
        $sql = $bdd->prepare("UPDATE article 
            SET titre=:titre,img=:img,contenu=:contenu 
            WHERE id_article=:id");
        $sql->execute([":titre" => $this->titre, ":img" => $this->img, ":contenu" => $this->contenu, ":id" => $this->id]);
    }
    //SUPPRIME L'ARTICLE SELECTIONNER
    public function delete($bdd)
    {
        $sql = $bdd->prepare("DELETE FROM article " .
            "WHERE id_article=:id");
        $sql->execute([":id" => $this->id]);
    }

    //AFFICHE TOUS LES TITRE DES ARTICLES A LA SUITE
    public function topArticle($bdd)
    {    
        return $bdd->query('SELECT * FROM article ');
    }

    //AFFICHE LES ARTICLE DE LA CATEGORIES CORRESPONDANT A L'ID QU'ON RECUPERE AVEC GET
    public function catselect($bdd)
    {
        $idcat = @$_GET["id"];
        return $cat = $bdd->query('SELECT * FROM article WHERE  id_cat="' . $idcat . '"');
        
    }
    public function insert($bdd)
    {
        $sql =$bdd->prepare("INSERT INTO article(titre,img,_date,contenu,id_cat,identifiant_user)
        VALUES (:titre,:img,:_date,:contenu,:id_cat,:identifiant_user)");
        if ($this->id_cat !== null && $this->identifiant_user && $this->id===null)

        $sql->execute([
            ":titre" => $this->titre,
            ":img" => $this->img,
            ":_date" => $this->_date,
            ":contenu" => $this->contenu,
            ":id_cat" => $this->id_cat,
            ":identifiant_user" => $this->identifiant_user,
        ]);
    }
}
