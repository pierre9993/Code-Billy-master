<?php

include('header.php');

$page=@$_GET["page"];

switch($page){
    case "acceuil":
        include('acceuil.php');
        break;
    case "contact":
        include('contact.php');
        break;
    case "services":
        include('services.php');
        break;
    case "produits":
        include('produits.php');
        break;
    case "connexion":
        include('connexion.php');
        break;
        default:
        include('acceuil.php');
}

?>


