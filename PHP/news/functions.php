<?php

function menu($bdd){
 
        $cat = $bdd->query('SELECT * FROM categories');
        while ($colonne = $cat->fetch()){
            echo "<li class='nav-item'>".
          ' <a class="nav-link" href="index.php?page=cat&id='.$colonne["id_cat"].'">'.$colonne["nom_cat"].'</a></li>';
        };

};


function topArticle($bdd){
    echo '<div class="container border mt-4">';
    $cat = $bdd->query('SELECT * FROM article');
    while ($colonne = $cat->fetch()){
        echo '<h2><a href="?page=art&id='.$colonne["id_cat"].'&id_art='.$colonne["id_article"].'">'.$colonne["titre"].'</a></h2>';
    };
    echo '</div>';
};

function catselect($bdd){
    $idcat=@$_GET["id"];
    $cat = $bdd->query('SELECT * FROM article WHERE  id_cat="'.$idcat.'"');
    while ($colonne = $cat->fetch()){
        echo '<div class="container border mt-4"><h2 class="mt-4" ><a href="?page=art&id='.$colonne["id_cat"].'&id_art='.$colonne["id_article"].'">'.$colonne["titre"].'</a></h2>'.
        '<p>'.utf8_encode($colonne["contenu"]).'</p></div>';
    };
};

function afficheArticle($bdd){
    $id_art=$_GET["id_art"];
    $cat = $bdd->query('SELECT * FROM article a INNER JOIN utilisateur u ON u.identifiant_user=a.identifiant_user INNER JOIN categories c ON a.id_cat=c.id_cat WHERE   id_article="'.$id_art.'" ');
    while ($colonne = $cat->fetch()){
        echo '<div class="container border mt-4"><h2 class="mt-4"><a onclick="afficheArticle($bdd)" href="?page=art&id='.$colonne["id_cat"].'&id_art='.$colonne["id_article"].'">'.$colonne["titre"].'</a></h2>'.
        '<img src="'.utf8_encode($colonne["img"]) .'"/>'.
        '<div> Date : '.utf8_encode($colonne["_date"]).'  | '. 
        ' Auteur : '.utf8_encode($colonne["nom"]).utf8_encode($colonne["prenom"]).' '.
        '  |   Catégorie : '.utf8_encode($colonne["nom_cat"]).
        '   </div><br>';
        
        echo '<p>'.utf8_encode($colonne["contenu"]).'</p></div>';
    };

}

function ajouteUser($bdd){
    $nom= $_POST["nom"];
    $prenom= $_POST["prenom"];
    $email= $_POST["email"];
    $tel= $_POST["tel"];
    $mdp= $_POST["mdp"];

    $sql = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,email,tel,mdp) VALUES (?,?,?,?,?)");
    
    if($sql->execute(["$nom", "$prenom", "$email","$tel","$mdp"])){
        echo"<div class='text-center alert alert-success'>Inscription réussie </div>";
    }
    else{
        echo"<div class='text-center alert alert-danger'>Inscription Interrompu </div>";

    }
 //   $bdd->query('INSERT INTO utilisateur(nom,prenom,email,tel,mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$email.'","'.$tel.'","'.$mdp.'")');
   
};
?>