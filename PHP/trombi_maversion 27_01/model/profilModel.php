<?php

class Profils
{

    public $bdd;
    public $id_user;
    public $nom;
    public $prenom;
    public $info;
    public $image;
    public $email;
    public $mdp;
    public $cv;
    public $id_contenu;
    public $id_role;

    //enregistre la bdd lors de l'instantiation de la class
    public function __construct()
    {
        $this->bdd = Bdd::connexion();
    }

    public function chercheProfils($recherche)
    {
        $sql = "SELECT * FROM users u WHERE nom LIKE :recherche OR prenom LIKE :recherche";
        $pre = $this->bdd->prepare($sql);
        $req = '%' . $recherche . '%';
        $pre->execute([':recherche' => $req]);
        return $pre->fetchAll();
    }
    public static function listeProfils()
    {
        return Bdd::connexion()->query("SELECT * FROM users ")->fetchAll();
    }
    public function profilSelect($id_user)
    {
        $profil = $this->bdd->prepare("SELECT * FROM users u
                                       INNER JOIN role r 
                                       ON r.id_role=u.id_role
                                       WHERE id_user=:id_user");
        $profil->execute([':id_user' => $id_user]);
        return $profil->fetch();
    }
    public function profilSelectCat($id_user)
    {
        $catprofil = $this->bdd->prepare("SELECT *  FROM contenus co
                                         INNER JOIN categories ca
                                         ON co.id_cat = ca.id_cat
                                         WHERE id_user=:id_user");
        $catprofil->execute([':id_user' => $id_user]);
        return $catprofil->fetchAll();
    }

    public function ajoutProfil()
    {
        $form = new FormControl;
        if (isset($_POST['nom'])) {
            $email = $form->emailController($_POST['email']);
            $nom = $form->nomController($_POST['nom']);
            $prenom = $form->nomController($_POST['prenom']);
            if ($email === true && $nom === true && $prenom === true) {
                $this->nom = @$_POST['nom'];
                $this->prenom = @$_POST['prenom'];
                $this->info = @$_POST['info'];
                $this->image = @$_POST['image'];
                $this->email = @$_POST['email'];
                $this->mdp = password_hash(@$_POST['mdp'], PASSWORD_DEFAULT);
                $this->cv = @$_POST['cv'];
                $this->id_role = @$_POST['id_role'];

                $sql = $this->bdd->prepare("INSERT INTO users(nom,prenom,info,image,email,mdp,cv,id_role) VALUES (:nom,:prenom,:info,:image,:email,:mdp,:cv,:id_role)");

                $sql->execute([
                    ":nom" => $this->nom,
                    ":prenom" => $this->prenom,
                    ":info" => $this->info,
                    ":image" => $this->image,
                    ":email" => $this->email,
                    ":mdp" => $this->mdp,
                    ":cv" => $this->cv,
                    ":id_role" => $this->id_role
                ]);
                return ["email" => $email, "nom" => $nom, "prenom" => $prenom];
            } else {
                return ["email" => $email, "nom" => $nom, "prenom" => $prenom];
            }
        } else {
            return 0;
        }
    }
    public function modifierProfil()
    {
        $form = new FormControl;
        if (isset($_POST['nom'])) {
            $email = $form->emailController($_POST['email']);
            $nom = $form->nomController($_POST['nom']);
            $prenom = $form->nomController($_POST['prenom']);
            if ($email === true && $nom === true && $prenom === true) {
                $this->id_user = @$_POST['id_user'];
                $this->nom = @$_POST['nom'];
                $this->prenom = @$_POST['prenom'];
                $this->info = @$_POST['info'];
                $this->image = @$_POST['image'];
                $this->email = @$_POST['email'];
                $this->cv = @$_POST['cv'];

                $sql = $this->bdd->prepare("UPDATE users SET nom=:nom,prenom=:prenom,info=:info,image=:image,email=:email,cv=:cv WHERE id_user=:id_user");

                $sql->execute([
                    ":nom" => $this->nom,
                    ":prenom" => $this->prenom,
                    ":info" => $this->info,
                    ":image" => $this->image,
                    ":email" => $this->email,
                    ":cv" => $this->cv,
                    ":id_user" => $this->id_user,
                ]);
                return ["email" => $email, "nom" => $nom, "prenom" => $prenom];
            } else {
                return ["email" => $email, "nom" => $nom, "prenom" => $prenom];
            }
        } else {
            return 0;
        }
    }

    public function connexion()
    {


        //ON SELECTIONNE LE USER DONT L'EMAIL A ETE INDIQUER DANS LE FORM
        $bdd = Bdd::connexion();
        $profilCrypt = $bdd->prepare('SELECT * FROM users WHERE email=:email');
        $profilCrypt->execute([":email" => @$_POST["email"]]);
        return $user = $profilCrypt->fetch();

        //ON RECUPERE LE MDP DE L'UTILISATEUR SELECTIONNE
        //   $mdpUser = $user['mdp'];

        /**
         * ON VA HASHER LE MOT DE PASSE récup AVEC password_hash(mdp clair du form, PASSWORD_DEFAULT)
         *  echo $mdpBcript= password_hash($mdp, PASSWORD_DEFAULT);
         */
    }
}
