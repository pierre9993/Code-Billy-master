<?php
class Router
{
    public $page;

    public function __construct($page)
    {
        $this->page=$page;
    }
    public function getPage()
    {
        switch($this->page){
            case'profils':
                $profils= new ProfilsController();
                $profils->afficheListeProfil();
                break;
            case'profil':
                $profil= new ProfilsController();
                $profil->afficheProfil(@$_GET['id']);
                break;
            case'monProfil':
                $profil= new ProfilsController();
                $profil->afficheProfil(@$_GET['id']);
                break;
            case'ajoutProfil':
                $profil= new ProfilsController();
                $profil->creerProfil();
                break;
            case'rechercher':
                $profil= new ProfilsController();
                $profil->rechercherProfils(@$_GET['recherche']);
                break;
            case'connexion':
                $profil= new ProfilsController();
                $profil->controleconnexion();
                break;
            case'deconnexion':
                $_SESSION=array();
                header('Location: index.php');
                break;
                default:
                include('acceuil.php');
                break;


        }

    }


}