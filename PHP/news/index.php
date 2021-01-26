<?php

include('bdd.php');
include("model/utilisateur.php");
include("model/article.php");
include("model/menu.php");
include("model/categorie.php");
include('header.php');


$page = @$_GET["page"];

switch ($page) {
    case 'cat':
        include('categories.php');
        break;
    case 'art':
        include('article.php');
        break;
    case 'inscription':
        include('controller/utilisateurController.php');
        formInscription($bdd);
        break;

        //OPTION ARTICLE
    case 'create_art':
        include('view/create_article.php');
        break;
    case 'update_art':
        include('view/update_article.php');
        break;
    case 'delete_art':
        include('view/delete_article.php');
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
        include("acceuil.php");
}

include('footer.php');
