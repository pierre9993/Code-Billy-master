<?php

class Article
{
    public $id;
    public $img;
    public $date;
    public $titre;
    public $nom_cat;
    public $id_cat;
    public $prenom;
    public $nom;
    public $contenu;

    private function __construct($bdd,$id = null)
    {
        $this->id = $id;
        if ($this->id !== null) {
            $this->fetch($bdd);
        }
    }

    private function fetch($bdd)
    {
        $id = $this->id;
        $cat = $bdd->query('SELECT * FROM article a INNER JOIN utilisateur u ON u.identifiant_user=a.identifiant_user INNER JOIN categories c ON a.id_cat=c.id_cat WHERE   id_article="' . $id . '" ');
        while ($colonne = $cat->fetch()) {
            $this->id_cat = $colonne["id_cat"];
            $this->titre = $colonne["titre"];
            $this->img = $colonne["img"];
            $this->date = $colonne["_date"];
            $this->nom = $colonne["nom"];
            $this->prenom = $colonne["prenom"];
            $this->nom_cat = $colonne["nom_cat"];
            $this->contenu = $colonne["contenu"];
        };
    }
    public function affiche()
    {
        echo '<div class="container border mt-4"><h2 class="mt-4"><a onclick="afficheArticle($bdd)" href="?page=art&id=' . $this->id_cat . '&id_art=' . $this->id . '">' . $this->titre . '</a></h2>' .
            '<img src="' . utf8_encode($this->img) . '"/>' .
            '<div> Date : ' . utf8_encode($this->date) . '  | ' .
            ' Auteur : ' . utf8_encode($this->nom) . utf8_encode($this->prenom) . ' ' .
            '  |   Catégorie : ' . utf8_encode($this->nom_cat) .
            '   </div><br>';

        echo '<p>' . utf8_encode($this->contenu) . '</p></div>';
    }
    public function update($bdd)
    {
        $sql = $bdd->prepare("UPDATE article " .
            "SET titre=:titre,img=:img,contenu=:contenu " .
            "WHERE id_article=:id");
        $sql->execute([":titre" => $this->titre, ":img" => $this->img, ":contenu" => $this->contenu, ":id" => $this->id]);
    }
}
