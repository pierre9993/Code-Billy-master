<?php

try{
    $bdd = new PDO("mysql:host=localhost;dbname=new","root","root");
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch(Exception $e){
    die('erreur de connexion à la bdd <br> $e');
}
?>