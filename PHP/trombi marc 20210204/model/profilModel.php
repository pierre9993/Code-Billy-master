<?php

namespace Model;

use Bdd;

/**
 * Modèle des Profils stockés en BDD.
 */
class ProfilModel
{
    private $id;
    private $nom;
    private $prenom;
    private $infos;
    private $image;
    private $cv;
    private $email;
    private $mdp;
    private $contenus; // ContenuModel[]

    // public $verif;

    // execute au meme temps que l'instanciation de la class

    /**
     * Renvoie un tableau de tous les profils sous forme d'objet.
     * 
     * @return array Tableau d'objets "ProfilModel"
     */
    public static function listeProfils()
    {
        $bdd = Bdd::connection();
        $resultat = $bdd->query('SELECT * FROM user')->fetchAll();
        // var_dump($resultat); //test
        $models = [];
        foreach ($resultat as $r) {
            $profil = new ProfilModel;
            $profil->fromArray($r);
            array_push($models, $profil);
        }
        $bdd = null;
        return $models;
    }

    /**
     * Fonction qui permet de remplir mon objet à partir d'un tableau de données
     * 
     * @param array $resultat
     */
    public function fromArray(array $resultat): void
    {
        $this->id = $resultat["id_user"];
        $this->nom = $resultat["nom"];
        $this->prenom = $resultat["prenom"];
        $this->infos = $resultat["infos"];
        $this->image = $resultat["image"];
        $this->email = $resultat["email"];
        $this->mdp = $resultat["mdp"];
    }

    /**
     * @param int $id_user Identifiant de l'utilisateur dont on veut récupérer le profil
     * @return void
     */
    public function fetch(int $id_user): void
    {
        $bdd = Bdd::connection();
        $profil = $bdd->prepare('SELECT * FROM user WHERE id_user=:id_user');
        $profil->execute([":id_user" => $id_user]);
        // var_dump($profil->fetch()); //test
        $resultat = $profil->fetch();
        $this->fromArray($resultat);

        $bdd = null;
    }

    /**
     * retourn un les categorie avec le contenus du profil $id_user
     */
    public function remplirContenusCategories(): void
    {
        $bdd = Bdd::connection();
        $sql = "SELECT contenu.*, categorie.nom AS cat 
                FROM contenu
                INNER JOIN categorie ON contenu.id_categorie=categorie.id_categorie 
                WHERE contenu.id_user=:id_user";

        $requete = $bdd->prepare($sql);
        $requete->execute([":id_user" => $this->id]);
        $resultat = $requete->fetchAll();

        $contenus = [];
        foreach ($resultat as $ligne) {
            $contenu = new ContenuModel($this);
            $contenu->fromArray($ligne);
            // $contenu->getCategorie() // instanceof CategorieModel
            array_push($contenus, $contenu);
        }
        $bdd = null;
        $this->contenus = $contenus;
    }


    // retourn un user
    public function inscription()
    {
        $bdd = Bdd::connection();
        $sql = 'INSERT INTO users(nom,prenom,infos,image,email,mdp) 
                VALUES (:nom,:prenom,:infos,:image,:email,:mdp)';
        $profil = $bdd->prepare($sql);
        $resultat = $profil->execute([
            ":nom" => $this->nom, ":prenom" => $this->prenom,
            ":infos" => $this->infos, ":image" => $this->image,
            ":email" => $this->email, ":mdp" => $this->mdp
        ]);
        $bdd = null;
        // var_dump($profil->fetch()); //test
        return $resultat; // true ou false
    }

    // modification de user
    public function update()
    {
        $bdd = Bdd::connection();
        $sql = 'UPDATE user
                SET nom=:nom,
                    prenom=:prenom,
                    infos=:infos,
                    cv=:cv,
                    image=:image,
                    email=:email,
                    mdp=:mdp
                WHERE id_user=:id_user';
        $requete = $bdd->prepare($sql);
        $resultat = $requete->execute([
            ":nom" => $this->nom,
            ":prenom" => $this->prenom,
            ":infos" => $this->infos,
            ":cv" => $this->cv,
            ":image" => $this->image,
            ":email" => $this->email,
            ":mdp" => $this->mdp,
            ":id_user" => $this->id
        ]);
        $bdd = null;
        // var_dump($profil->fetch()); //test
        return $resultat; // true ou false
    }

    /**
     * 2 possibilités :
     *    1. méthode statique qui renvoie un ProfilModel à partir d'un email donné ! 
     *    2. méthode non-statique d'un objet existant ProfilModel, 
     *       qui va remplir les infos de soi-même à partir de son propre email
     */
    /**
     * Cas 1 :
     */
    public static function getProfilFromEmail(string $email): ProfilModel
    {
        $bdd = Bdd::connection();
        $requete = $bdd->prepare('SELECT * FROM user WHERE email=:email');
        $requete->execute([":email" => $email]);
        $resultat = $requete->fetch();

        $profil = new ProfilModel;
        $profil->fromArray($resultat);

        $bdd = null;
        return $profil;
    }
    /**
     * Cas 2 :
     */
    public function fetchFromEmail(): void
    {
        $bdd = Bdd::connection();
        $requete = $bdd->prepare('SELECT * FROM user WHERE email=:email');
        $requete->execute([":email" => $this->email]);
        $resultat = $requete->fetch();

        $this->fromArray($resultat);

        $bdd = null;
    }

    /**
     * GETTERS
     */
    public function getId(): int
    {
        return $this->id;
    }
    public function getNom(): string
    {
        return ucfirst($this->nom);
    }
    public function getPrenom(): string
    {
        return ucfirst($this->prenom);
    }
    public function getImage(): string
    {
        return $this->image;
    }
    public function getInfos(): string
    {
        return $this->infos;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getCv(): string
    {
        return $this->cv;
    }
    public function getMdp(): string
    {
        return $this->mdp;
    }
    /**
     * @return ContenuModel[]
     */
    public function getContenus(): array
    {
        return $this->contenus;
    }
    /**
     * @return string "Prenom NOM" à partir des infos du profil.
     */
    public function getFullname(): string
    {
        return ucfirst($this->prenom) . " " . strtoupper($this->nom);
    }
}

// test le model ProfilsModel et ses methodes
//$test=new ProfilsModel();
//$test->listeProfils();
//$test->Profil(2);