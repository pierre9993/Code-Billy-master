<?php
include('model/profilModel.php');

class ProfilsController extends Profils
{


    public function afficheListeProfil()
    {
        $listeProfils = Profils::listeProfils();
        include('view/profils/viewprofils.php');
    }

    public function afficheProfil(int $id):void
    {
        if ($id !== null) {
            //on récup les info du profil
            $profilSelect = $this->profilSelect($id);
            //on récup le contenue du profil 
            $catSelect = $this->profilSelectCat($id);
            if(isset($_POST['submit'])){
                //si on a un post on modifie le profil
                $modifcheck = $this->modifierProfil();
                //je raffraichi la page pour appliquer les modifs
                header("location: ?page=profil&id=".$profilSelect['id_user']."");
        }
        include('view/profils/viewProfil.php');
        } else {
            include('view/404.php');
        }
    }
    public function creerProfil()
    {
        $newProfil = $this->ajoutProfil();
        include('view/profils/viewAjoutProfil.php');
    }

    public function rechercherProfils($recherche)
    {
        if ($recherche !== null) {
            $profilsCherche = $this->chercheProfils($recherche);
            include('view/profils/viewRechercheProfils.php');
        } else {
            include('view/404.php');
        }
    }
    public function controleconnexion()
    {

        if (isset($_POST["mdp"])) {
            
            //Cryptage
            $mdpmd5 = md5($_POST["mdp"]);
            $connexion = $this->connexion();
            
            if (password_verify(@$_POST["mdp"], $connexion['mdp'])) {
                
                $_SESSION['nom']=$connexion['nom'];
                $_SESSION['prenom']=$connexion['prenom'];
                $_SESSION['id_user']=$connexion['id_user'];
                
                //     $_SESSION["nom_user]= $user["nom"]
                header('Location: index.php');
               $co= 1;
           }
           else{
            $co= 0;
           }
            include('view/profils/viewConnexion.php');
        } else {
            include('view/profils/viewConnexion.php');
        }
    }

    
}

/*
$profils = new ProfilsController();
$profils -> afficheListeProfil();

/$profils -> afficheProfil();Y a une erreur ici
*/