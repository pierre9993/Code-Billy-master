<?php
//include("../bdd.php");
include("model/profilsModel.php");
include("controller/verificationController.php");
include("controller/fileController.php");

class ProfilsController extends ProfilsModel
{

    public $nom;
    public $prenom;
    public $info;
    public $image;
    public $cv;
    public $email;
    public $mdp;
    public $verif;
    // public $bdd;

    // execute au meme temps que l'instentiation de la class
    public function __construct()
    {
        $this->verif = new verification();
    }

    public function AfficheListeProfils()
    {
        $listeProfils = $this->listeProfils(); // model
        //    var_dump($listeProfils); test
        include("view/profils/viewListeProfils.php"); // vue
    }

    public function AfficheProfil($id = null)
    {
        if ($id !== null) {
            $profil = $this->Profil($id);
            $profilConCat = $this->ProfilContenusCategories($id);
            $cats= $this->getCat();
            // si je modifie mon profil
            if (isset($_POST['nom_contenus'])) {
                $ajoutContenu=$this->setContenu($id);
            }
            // si je modifie mon profil
            if (isset($_POST['email'])) {
                $this->setModificationProfil();
            }

            include("view/profils/viewProfil.php");
        } else {
            include("view/404.php");
        }
    }

    public function setModificationProfil()
    {
        $id = $_SESSION["id_user"];
        $this->nom = $this->verif->verfNomPrenom($_POST["nom"]);
        $this->prenom = $this->verif->verfNomPrenom($_POST["prenom"]);
        $this->info = $_POST["infos"];
        $this->email = $this->verif->verfEmail($_POST["email"]);

        if ($this->email && $this->nom && $this->prenom) {

            $photo = new FileController();
            $this->image = $photo->upload('image',$this->nom);
            $this->cv = $photo->upload('cv',$this->nom);

            $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            if ($this->modificationProfil($id)) {
                $_SESSION['nom'] = $this->nom;
                $_SESSION['prenom'] =  $this->prenom;
                //header('Location: index.php?page=monProfil');
                //    echo   $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
            }
        }
    }
    public function admin(){
        $profils=$this->listeProfils();
        $cats= $this->getCat();
        if(isset($_GET['id_sup'])===true){
            $profilSup=$this->deleteProfil($_GET['id_sup']);
        }
        if(isset($_GET['cat_sup'])===true){
            $catSup=$this->deleteCat($_GET['cat_sup']);
        }
        if(isset($_POST['nom_cat'])===true){
            $catSet=$this->setCat($_POST['nom_cat']);
        }
        include('view/admin/adminView.php');
    }

    public function setInscription()
    {
        // je verifie que j'ai envoyer le formulaire
        // si le formulaire est envoyé j'entre dans la condition
        // si non j'affiche la vue du formulaire dans else

        $this->nom = $this->verif->verfNomPrenom(@$_POST["nom"]);
        $this->prenom = $this->verif->verfNomPrenom(@$_POST["prenom"]);
        $this->info = @$_POST["infos"];
        $this->image = @$_POST["image"];
        $this->email = $this->verif->verfEmail(@$_POST["email"]);


        // affiche les message
        if (isset($_POST['email'])) {
            $message = "<center class='alert alert-danger'>Inscription n'est pas pris en compte <br>";
            if (!$this->email) {
                $message .= "mail incorecte <br>";
            }
            if (!$this->nom) {
                $message .= "nom incorecte <br>";
            }
            $message .= "</center>";
        }

        if ($this->email && $this->nom && $this->prenom) {
            $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            if ($this->inscription()) {
                echo   $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
            } else {
                include("view/inscription.php");
            }
        }
        // si le frmulaire n'est pas envoyer
        // j'affiche la vue du formulaire
        else {
            include("view/inscription.php");
        }
    }


    public function getConnexion() // controller
    {
        if (isset($_POST["email"]) && isset($_POST["mdp"])) {

            $this->email = $this->verif->verfEmail(@$_POST["email"]);
            $profil = $this->connexion(); // model

            if (password_verify($_POST["mdp"], $profil['mdp'])) {

                $_SESSION['nom'] = $profil['nom'];
                $_SESSION['prenom'] = $profil['prenom'];
                $_SESSION['id_user'] = $profil['id_user'];
                $role= $this->getRole($profil['id_role']);
                $_SESSION['nom_role']=$role["nom_role"];
                // redirection vers la route monProfil
                header('Location: index.php?page=monProfil');
            } else {
                echo $message = "<center class='alert alert-danger'>Email ou mdp incorrecte</center>";
                include("view/connexion.php"); // view
            }
        } else {
            include("view/connexion.php"); // view
        }
    }
}

// test 
// $profils = new ProfilsController();
// $profils->AfficheListeProfils();
//$profils->AfficheProfil(1);
