<?php

class Son
{

    public $id_son;
    public $nom_son;
    public $img_son;
    public $lien_son;
    public $nom_cat;
    public $nom_artiste;

    /**
     * Fonction qui permet de remplir mon objet à partir d'un tableau de données
     * 
     * @param array $resultat
     */
    public function fromArray(array $resultat)
    {
        $this->id_son = @$resultat["id_son"];
        $this->nom_son = @$resultat["nom_son"];
        $this->img_son = @$resultat["img_son"];
        $this->lien_son = @$resultat["lien_son"];
        $this->nom_cat = @$resultat["nom_cat"];
        $this->nom_artiste = @$resultat["nom_artiste"];
    }


    /**
     * Fonction qui selectionne tous les sons
     */
    public static function listeSons(): array
    {
        $bdd = Bdd::connexion();
        $resultatsRequete = $bdd->query('SELECT * FROM son ')->fetchAll();
        $listeSons = [];
        foreach ($resultatsRequete as $r) {
            $son = new Son;
            $son->fromArray($r);
            array_push($listeSons, $son);
        }
        $bdd = null;
        return $listeSons;
    }

    public static function getSon($id_son)
    {
        $bdd = Bdd::connexion();
        $requete = $bdd->prepare('SELECT * FROM son s WHERE id_son=:id_son');
        $requete->execute([":id_son" => $id_son]);
        $resultat = $requete->fetch();
        $son = new Son;
        $son->fromArray($resultat);

        $bdd = null;
        return $son;
    }

    public static function getInfo($id_son)
    {
        $bdd = Bdd::connexion();
        $requete = $bdd->prepare('SELECT * FROM son
                                INNER JOIN artistes_son ON artistes_son.id_son=son.id_son
                                INNER JOIN artiste  ON artiste.id_artiste=artistes_son.id_artiste
                                INNER JOIN categorie_son  ON categorie_son.id_son=son.id_son
                                INNER JOIN categorie ON categorie.id_cat=categorie_son.id_cat
                                WHERE son.id_son=:id_son');
        $requete->execute([":id_son" => $id_son]);
        $resultat = $requete->fetch();
        /*$son = new Son;
        $son->fromArray($resultat);
        $bdd = null;
        return $son;*/
        return $resultat;
    }

    public static function ajoutSon($img_son,$lien_son)
    {
        $nom_son= $_POST['nom_son'];
       
            $bdd = Bdd::connexion();
            $requete = $bdd->prepare("INSERT INTO son (nom_son,img_son,lien_son) VALUES (:nom_son,:img_son,:lien_son)");
            $requete->execute([':nom_son' => $nom_son, ':img_son' => $img_son, ':lien_son' => $lien_son]);
            echo'Son créé';
    }
}
