<?php

include('bdd.php');

$bdd=new Bdd();
$bdd->connexion();

include('test.php');
include('view/menu/header.php');
include('test2.php');



include('view/menu/footer.php');