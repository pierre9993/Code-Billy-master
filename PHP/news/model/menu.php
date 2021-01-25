<?php

class Menu
{
    public $bdd;
    public $site;
    public $categorie;



    // CREER LIEN MENU POUR CHAQUE CATEGORIES
    public function __construct(PDO $bdd,$site)
    {
        $this->site=$site;
        $this->categorie = $bdd->query('SELECT * FROM categories')->fetchAll();
    }
    public function afficheMenu()
    {
        echo '<nav class="navbar navbar-expand-sm bg-light border-bottom" id="navbar">
        <a class="navbar-brand" href="index.php?page=">'.$this->site.'</a>
        <ul class="navbar-nav">';
        echo  '<li class="nav-item" ><a class="nav-link" href="index.php?page=update_art">update article<a></li>';
        echo  '<li class="nav-item" ><a class="nav-link" href="index.php?page=create_art">nouvel article<a></li>';
        echo  '<li class="nav-item" ><a class="nav-link" href="index.php?page=inscription">Inscription<a></li>';

        foreach ($this->categorie as $ligne) {
            echo "<li class='nav-item'>" .
                ' <a class="nav-link" href="index.php?page=cat&id=' . $ligne["id_cat"] . '">' . $ligne["nom_cat"] . '</a></li>';
        };
        echo  "</ul>        </nav>";
    }
}
