<?php

include('bdd.php');
include("model/utilisateur.php");
include("model/article.php");
include("model/menu.php");
include('header.php');


$page=@$_GET["page"];

switch($page){
    case 'cat':
        include('categories.php');
        break;
    case 'art':
        include('article.php');
        break;
    case 'create_art':
        include('vue/create_article.php');
        break;
    case 'update_art':
        include('vue/update_article.php');
        break;
    case 'inscription':
        include('inscription.php');
        break;

        default:
        include("acceuil.php");
        
}

include ('footer.php');
