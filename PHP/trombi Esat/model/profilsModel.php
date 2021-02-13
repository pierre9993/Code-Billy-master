<?php
//include("../bdd.php"); // test
class ProfilsModel
{
    // execute au meme temps que l'instentiation de la class

    // retourn une liste des users
    public function listeProfils()
    {
        $bdd = Bdd::Connection();
        $resultat = $bdd->query('SELECT * FROM users')->fetchAll();
        // var_dump($resultat); //test
        $bdd = null;
        return $resultat;
    }

    // retourn un user
    public function Profil($id_user)
    {
        $bdd = Bdd::Connection();
        $profil = $bdd->prepare('SELECT * FROM users WHERE id_user=:id_user');
        $profil->execute([":id_user" => $id_user]);
        // var_dump($profil->fetch()); //test
        $resultat = $profil->fetch();

        $bdd = null;

        return $resultat;
    }

    // retourn un les categorie avec le contenus du profil $id_user
    public function ProfilContenusCategories($id_user)
    {
        $bdd = Bdd::Connection();
        $sql = "SELECT *  FROM contenus 
        INNER JOIN categories ON contenus.id_cat=categories.id_cat 
        WHERE contenus.id_user=:id_user";

        $profil = $bdd->prepare($sql);
        $profil->execute([":id_user" => $id_user]);
        $resultat = $profil->fetchAll();

        $bdd = null;
        return $resultat;
    }
    public function getCat()
    {
        $bdd = Bdd::Connection();
        $sql = "SELECT *  FROM categories";

        $resultat = $bdd->query($sql)->fetchAll();

        $bdd = null;
        return $resultat;
    }

    public function setCat($nom_cat)
    {
        $bdd = Bdd::Connection();
        $sql = 'INSERT INTO categories(nom_cat) VALUES (:nom_cat)';
        $cat = $bdd->prepare($sql);
        if ($cat->execute([':nom_cat'=>$nom_cat])){
            return true;
        }
        else{
            return false;
        }
    }


    // retourn un user
    public function inscription()
    {
        $bdd = Bdd::Connection();
        $sql = 'INSERT INTO users(nom,prenom,info,image,email,mdp) 
                VALUES (:nom,:prenom,:info,:image,:email,:mdp)';
        $profil = $bdd->prepare($sql);
        $resultat = $profil->execute([
            ":nom" => $this->nom, ":prenom" => $this->prenom,
            ":info" => $this->info, ":image" => $this->image,
            ":email" => $this->email, ":mdp" => $this->mdp
        ]);
        $bdd = null;
        // var_dump($profil->fetch()); //test
        return $resultat; // true ou false
    }

    // modification de user
    public function modificationProfil($id)
    {
        $bdd = Bdd::Connection();
        $sql = 'UPDATE users SET nom=:nom,prenom=:prenom,info=:info,
        cv=:cv,image=:image,email=:email,mdp=:mdp
        WHERE id_user=:id_user';
        $profil = $bdd->prepare($sql);
        $resultat = $profil->execute([
            ":nom" => $this->nom, ":prenom" => $this->prenom,
            ":info" => $this->info, ":cv" => $this->cv, ":image" => $this->image,
            ":email" => $this->email, ":mdp" => $this->mdp, ":id_user" => $id
        ]);
        $bdd = null;
        // var_dump($profil->fetch()); //test
        return $resultat; // true ou false
    }


    public function connexion()
    {
        $bdd = Bdd::Connection();
        $profil = $bdd->prepare('SELECT * FROM users WHERE email=:email');
        $profil->execute([":email" => $this->email]);
        $resultat = $profil->fetch();
        $bdd = null;
        return $resultat;
    }

    public function setContenu($id_user)
    {
        $bdd = Bdd::Connection();
        $requete = $bdd->prepare("INSERT INTO contenus(nom_contenus,description_contenus,id_cat,id_user)
                                VALUES   (:nom_contenus,:description_contenus,:id_cat,:id_user ) ");
        if ($requete->execute([":nom_contenus" => $_POST['nom_contenus'], ":description_contenus" => $_POST['description_contenus'], ":id_cat" => $_POST['id_cat'], ":id_user" => $id_user])) {
            return true;
        }
        return false;
    }

    public function deleteProfil($id_user)
    {
        $bdd = Bdd::Connection();
        $requete = $bdd->prepare("DELETE FROM users
                                WHERE id_user=:id_user;
                                DELETE FROM contenus
                                WHERE id_user=:id_user;  ");
        if ($requete->execute(["id_user" => $id_user])) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteCat($id_cat)
    {
        $bdd = Bdd::Connection();
        $requete = $bdd->prepare("DELETE FROM categories
                                WHERE id_cat=:id_cat; ");
        if ($requete->execute(["id_cat" => $id_cat])) {
            return true;
        } else {
            return false;
        }
    }
    public function getRole($id_role)
    {
        $bdd = Bdd::Connection();
        $requete = $bdd->prepare('SELECT * FROM role WHERE id_role=:id_role');
        $requete->execute([":id_role" => $id_role]);
        return $requete->fetch();
    }
}

// test le model ProfilsModel et ses methodes
//$test=new ProfilsModel();
//$test->listeProfils();
//$test->Profil(2);