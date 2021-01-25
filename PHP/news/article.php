<?php
  //  afficheArticle($bdd);
    
    $article=new Article($bdd,$_GET["id_art"]);
    $article->affiche();
    $article->contenu="Salut";
    $article->update($bdd);
