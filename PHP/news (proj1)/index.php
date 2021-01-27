<?php

include('bdd.php');
include("model/utilisateur.php");
include("model/article.php");
include("model/menu.php");
include("model/categorie.php");
include('view/menu/header.php');


$page = @$_GET["page"];

        switch ($page) {
            case 'cat':
                include('controller/articleController.php');
                categorie($bdd);
                //include('categories.php');
                break;
            case 'art':
                include('controller/articleController.php');
                article($bdd);
                //   include('article.php');
                break;
            case 'inscription':
                include('controller/utilisateurController.php');
                formInscription($bdd);
                break;

                //OPTION ARTICLE
            case 'create_art':
                include('controller/articleController.php');
                insert($bdd);
                //include('view/articles/create_article.php');
                break;
            case 'update_art':
                include('controller/articleController.php');
                update($bdd);
                //include('view/articles/update_article.php');
                break;
            case 'delete_art':
                include('controller/articleController.php');
                delete($bdd);
                //include('view/articles/delete_article.php');
                break;

                //OPTION CATEGORIES
            case 'create_cat':
                include('controller/categorieController.php');
                create($bdd);
                break;
            case 'update_cat':
                include('controller/categorieController.php');
                update($bdd);
                break;
            case 'delete_cat':
                include('controller/categorieController.php');
                delete($bdd);
                break;

            default:
                include('controller/articleController.php');
                acceuil($bdd);
                // include("acceuil.php");
        }
    

include('view/menu/footer.php');
/*
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
/* function getPage(PDO $bdd)
    {
        switch ($this->page) {
            case 'create_cat':
                $controller = new CategorieController($bdd);
                $controller->create();
                break;
            case 'update_cat':
                $controller = new CategorieController($bdd);
                $controller->update($_GET["id"]);
                break;

            default:
                $controller = new AccueilController($bdd);
                $controller->affiche();
                break;
        }
    }
}*/
/*
$router = new Router(@$_GET["page"]); // On récupère la valeur associée à la clé "page" dans l'url
// exemple localhost/index.php?page=create_cat 

$router->getPage($bdd);
*/