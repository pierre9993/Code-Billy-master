<?php
include('index.php');

$email= $_POST["email"];
$pwd= $_POST["pwd"];
/*
if($email ==="test@test.fr" && $pwd==="1234"){
    ?><script>alert("connexion réussi!");</script><?php
    
}
else{
    ?><script>alert("Identifiant Incorrect");</script><?php
    
};*/
switch($email.$pwd){
    case ($email ==="test@test.fr" && $pwd==="1234"):
    ?><script>alert("connexion réussi!");</script><?php
        break;
        default:
        ?><script>alert("Identifiant Incorrect");</script><?php
        break;
}
?>