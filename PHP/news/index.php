<?php

include('bdd.php');

include('functions.php');

include ('header.php');


$page=@$_GET["page"];

switch($page){
    case 'cat':
        include('categories.php');
        break;
    case 'art':
        include('article.php');
        break;
    case 'inscription':
        include('inscription.php');
        break;

        default:
        include("acceuil.php");
        
}


include ('footer.php');

?>