<?php
  //  afficheArticle($bdd);
    
    include('model/article.php');
    $article=new Article($bdd,$_GET["id_art"]);
    $article->affiche();
    $article->contenu="bonjour";
    $article->update($bdd);
?>