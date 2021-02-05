<?php

include("controller/profilController.php");
include("controller/rechercheController.php");

class Router
{
    private $page;

    public function __construct($page = null)
    {
        $this->page = $page;
    }

    /**
     * Déclenche l'appel au controller adéquat en fonction de la page demandée par l'utilisateur.
     * 
     * @param PDO $bdd Objet de connexion à la BDD.
     */
    function getPage()
    {
        switch ($this->page) {
            case 'profils':
                $profilController = new ProfilController();
                $profilController->afficheListeProfils();
                break;

            case 'profil':
                $profil = new ProfilController();
                $profil->afficheProfil(@$_GET["id"]);
                break;

            case 'monProfil':
                $profil = new ProfilController();
                $profil->AfficheProfil(@$_SESSION["id_user"]);
                break;

            case 'inscription':
                $profil = new ProfilController();
                $profil->setInscription();
                break;

            case 'connexion':
                echo "la route fonctionne";
                $profil = new ProfilController();
                $profil->getConnexion();
                break;

            case 'deconnexion':
                // vide la session et donc je me deconnecte
                $_SESSION = array();
                // redirection vers index.php
                header('Location: index.php');
                break;

            case 'recherche':
                $recherche = new RechercheController();
                $recherche->AfficheChercher(@$_GET["q"]);
                break;

            default:
                $profils = new ProfilController();
                $profils->AfficheListeProfils();

                break;
        }
    }
}
