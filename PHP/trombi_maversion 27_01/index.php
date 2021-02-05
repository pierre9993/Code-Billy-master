<?php
//demarre une session   
session_start();


require_once('bdd.php');

include('view/menu/header.php');

include('controller/profilsController.php');
include('controller/formController.php');

require_once("router.php");
$router=new Router(@$_GET['page']);
$router->getPage();


include('view/menu/footer.php');
