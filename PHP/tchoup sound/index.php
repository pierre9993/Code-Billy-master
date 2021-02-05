<?php
//demarre une session   
session_start();
// récupération bdd
require_once('bdd.php');

//affiche header
include('view/menu/header.php');

//on récupère le router et on inclu la page
require_once('router.php');
$router = new Router(@$_GET['page']);
$router->getPage();

//affiche footer
include('view/menu/footer.php');
