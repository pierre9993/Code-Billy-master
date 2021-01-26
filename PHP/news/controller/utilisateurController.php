<?php

function formInscription($bdd)
{
    $user = new Utilisateur;
    $user->fromPost();

    if ($user->nom !== null) {
        $user->ajoutUser($bdd);
    }
        
        include('view/utilisateur/inscription_user.php'); 
}