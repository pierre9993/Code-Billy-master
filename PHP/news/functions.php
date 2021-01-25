<?php

// CREER LIEN MENU POUR CHAQUE CATEGORIES
function menu($bdd){
 
        $cat = $bdd->query('SELECT * FROM categories');
        while ($colonne = $cat->fetch()){
            echo "<li class='nav-item'>".
          ' <a class="nav-link" href="index.php?page=cat&id='.$colonne["id_cat"].'">'.$colonne["nom_cat"].'</a></li>';
        };

};

 //   $bdd->query('INSERT INTO utilisateur(nom,prenom,email,tel,mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$email.'","'.$tel.'","'.$mdp.'")');
