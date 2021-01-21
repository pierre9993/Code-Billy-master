<?php
$email= $_GET["email"];
$mdp= $_GET["mdp"];

if($email ==="test@test.fr" && $mdp==="1234"){
    echo "connexion réussi!";
}
else{
    echo "Identifiant Incorrect";
};

?>