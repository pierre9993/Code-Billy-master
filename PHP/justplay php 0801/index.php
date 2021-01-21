<?php



$page=@$_GET["page"];

switch($page){
    case "connexion":
        break;
    case "inscription":
        include('inscription.php');
        break;
    case "accueil.php":
        include('accueil.php');
        break;
        default:
        include('accueil.php');
}

include_once('header.php');
include_once('footer.php');

?>