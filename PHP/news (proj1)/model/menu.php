<?php

class Menu
{
    public $bdd;
    public $titresite;
    public $categorie;



    // CREER LIEN MENU POUR CHAQUE CATEGORIES
    public function __construct(PDO $bdd,$titresite)
    {
        $this->titresite=$titresite;
        $this->categorie = $bdd->query('SELECT * FROM categories')->fetchAll();
    }
    
    public function afficheMenu()
    {
        echo '<nav class="navbar navbar-expand-sm bg-light border-bottom" id="navbar">
        <a class="navbar-brand" href="index.php?page=">'.$this->titresite.'</a>
        <ul class="navbar-nav">';

        //Affiche les option pour les articles dans un dropdown
       echo '<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> article</a>
      <div class="dropdown-menu">
        <a class="nav-link" href="index.php?page=delete_art">delete article<a>
          <a class="nav-link" href="index.php?page=update_art">update article<a>
         <a class="nav-link" href="index.php?page=create_art">nouvel article<a>
      </div></li>';
        //Affiche les option pour les Cat dans un dropdown
       echo '<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> catégories</a>
      <div class="dropdown-menu">
        <a class="nav-link" href="index.php?page=delete_cat">delete catégories<a>
          <a class="nav-link" href="index.php?page=update_cat">update catégories<a>
         <a class="nav-link" href="index.php?page=create_cat">nouvel catégories<a>
      </div></li>';
        
        echo  '<li class="nav-item" ><a class="nav-link" href="index.php?page=inscription">Inscription<a></li>';
        foreach ($this->categorie as $ligne) {
            echo "<li class='nav-item'>" .
                ' <a class="nav-link" href="index.php?page=cat&id=' . $ligne["id_cat"] . '">' . $ligne["nom_cat"] . '</a></li>';
        };
        echo  "</ul>        </nav>";
    }
}
