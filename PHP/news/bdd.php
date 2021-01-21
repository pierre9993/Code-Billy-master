<?php

try{
    $bdd = new PDO("mysql:host=localhost;dbname=new","root","root");

} catch(Exception $e){
    die('erreur de connexion à la bdd <br> $e');
}
?>