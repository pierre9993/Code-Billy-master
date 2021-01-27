<?php
//AFFICHE L'ARTICLE SELECTIONNE
function article($bdd){
    $article = new Article($bdd, $_GET["id_art"]);
    include('view/articles/article.php');
}

function acceuil($bdd){
    $articles= new Article($bdd);
    $topArt= $articles->topArticle($bdd); 
    include("view/articles/acceuil.php");
}

function categorie($bdd){
    $article= new Article($bdd);
    $cat=$article-> catselect($bdd);
    include('view/articles/categories.php');
}

function insert($bdd){

    $article = new Article($bdd);
$article->titre = @$_POST["titre"];
$article->contenu = @$_POST["contenu"];
$article->img = @$_POST["img"];
$article->id_cat = @$_POST["id_cat"];
$article->identifiant_user = 2; //TOdo plus tard et prendre l'utilisateur connecté
$date = new \DateTime();
$article->_date = $date->format('Y-m-d');
$article->insert($bdd);

include('view/articles/create_article.php');
}

function update($bdd){

    $article = new Article($bdd);
    
    $article->titre = @$_POST["titre"];
    $article->contenu = @$_POST["contenu"];
    $article->img = @$_POST["img"];
    $article->id= @$_POST["id"];
    $article->identifiant_user = 2; //TOdo plus tard et prendre l'utilisateur connecté
    

    $article->update($bdd);

include('view/articles/update_article.php');
}


function delete($bdd){

    $article = new Article($bdd);
    $article->id = @$_POST["id"];
    $article->delete($bdd);
    
    include('view/articles/delete_article.php');
}

