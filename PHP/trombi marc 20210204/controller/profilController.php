<?php
//include("../bdd.php");
use Model\ProfilModel;

include("controller/verificationController.php");
include("controller/fileController.php");
include("controller/controller.php");

class ProfilController extends Controller
{
    private $verif;

    // execute au meme temps que l'instanciation de la class
    public function __construct()
    {
        $this->verif = new Verification();
    }

    public function afficheListeProfils()
    {
        $listeProfils = ProfilModel::listeProfils(); // array de ProfilModel
        //    var_dump($listeProfils); test
        include("view/profils/viewListeProfils.php"); // vue
    }

    /**
     * Fonction associée à la route "profil" qui sert à afficher un profil.
     * 
     * @param string $id Id du profil à afficher
     */
    public function afficheProfil(string $id = null): void
    {
        if ($id !== null) {
            $profil = new ProfilModel;
            // $profil->nom // null
            $profil->fetch($id);
            // $profil->nom // "Schwarzenegger"

            // Maintenant on remplit "contenus" et "categories" pour le profil.
            $profil->remplirContenusCategories();

            // si je modifie mon profil
            if (
                isset($_SESSION['id_user']) &&
                $_SESSION['id_user'] === $profil->getId() &&
                isset($_POST['submit'])
            ) {
                $this->modifieProfil($profil);
            }

            include("view/profils/viewProfil.php");
        } else {
            $this->affiche404();
        }
    }

    /**
     * Cette fonction permet de modifier le ProfilModel donné en entrée
     * à partir des données du $_POST.
     */
    public function modifieProfil(ProfilModel $profil): void
    {
        /** @todo on ne peut pas mettre à jour directement les
         * propriétés privées !!
         */
        $profil->nom = $this->verif->verfNomPrenom($_POST["nom"]);
        $profil->prenom = $this->verif->verfNomPrenom($_POST["prenom"]);
        $profil->infos = $_POST["infos"];
        $profil->email = $this->verif->verfEmail($_POST["email"]);

        if ($profil->getEmail() && $profil->getNom() && $profil->getPrenom()) {

            $fileController = new FileController();
            $profil->image = $fileController->upload('image');
            $profil->cv = $fileController->upload('cv');

            $profil->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

            if ($profil->update()) {
                $_SESSION['nom'] = $profil->getNom();
                $_SESSION['prenom'] =  $profil->getPrenom();
                header('Location: index.php?page=monProfil');
                //    echo   $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
            }
        }
    }


    public function setInscription()
    {
        // je verifie que j'ai envoyer le formulaire
        // si le formulaire est envoyé j'entre dans la condition
        // si non j'affiche la vue du formulaire dans else

        /**
         * @todo : il faut créer un ProfilModel pour stocker ces infos !
         * $this-> nom n'existe pas dans un controller ! (les autres non plus !)
         */

        $this->nom = $this->verif->verfNomPrenom(@$_POST["nom"]);
        $this->prenom = $this->verif->verfNomPrenom(@$_POST["prenom"]);
        $this->infos = @$_POST["infos"];
        $this->image = @$_POST["image"];
        $this->email = $this->verif->verfEmail(@$_POST["email"]);


        // affiche les message
        if (isset($_POST['email'])) {
            $message = "<center class='alert alert-danger'>Inscription n'est pas pris en compte <br>";
            if (!$this->email) {
                $message .= "mail incorrect <br>";
            }
            if (!$this->nom) {
                $message .= "nom incorrect <br>";
            }
            $message .= "</center>";
        }

        if ($this->email && $this->nom && $this->prenom) {
            $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
            if ($profil->create()) {
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

            $email = $this->verif->verfEmail(@$_POST["email"]);

            // CAS 1 :
            // NON : $profil = $this->connexion(); // model
            $profil = ProfilModel::getProfilFromEmail($email);
            // CAS 2 :
            $profil2 = new ProfilModel;
            /** @todo email est private */
            $profil2->email = $email;
            $profil2->fetchFromEmail();

            // $profil et $profil2 contiennent les mêmes informations !!!!!!!!

            if (password_verify($_POST["mdp"], $profil->getMdp())) {

                $_SESSION['nom'] = $profil->getNom();
                $_SESSION['prenom'] = $profil->getPrenom();
                $_SESSION['id_user'] = $profil->getId();
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
