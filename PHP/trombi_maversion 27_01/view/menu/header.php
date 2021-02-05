<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Trombi</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php?page=">TROMBI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php?page=profils">Profils </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <?php /*
        // PREMIERE VERSION QUI FONCTIONNE 
        if ($_SESSION['nom'] == null) {
          echo '<li class="nav-item">        <a href="?page=connexion" class=" nav-link button  pr-2 pl-2">Connexion</a>      </li>';
          echo '<li class="nav-item">        <a href="?page=ajoutProfil" class=" nav-link button  pr-2 pl-2">Inscription</a>      </li>';
        } else {
          echo '<li class="nav-item">   <a href="?page=monProfil&id=' . $_SESSION['id_user'] . '" class=" nav-link button  pr-2 pl-2">' . $_SESSION['nom'] . '</a></li>';
        }
        */

        
        // DEUXIEME VERSION 
        if (isset($_SESSION['id_user'])) {
          echo ' <li class="nav-item"> <a href="?page=monProfil&id=' . $_SESSION['id_user'] . '" class=" nav-link button  pr-2 pl-2"> ' .  $_SESSION['nom'] . ' </a></li>';
          echo ' <li class="nav-item"> <a href="?page=deconnexion" class=" nav-link button  pr-2 pl-2"> Déconnexion </a></li>';
        } else {
          echo ' <li class="nav-item"> <a href="?page=connexion" class=" nav-link button  pr-2 pl-2">Connexion</a> </li>';
          echo ' <li class="nav-item"> <a href="?page=ajoutProfil" class=" nav-link button  pr-2 pl-2">Inscription</a> </li>';
        }
        ?>


      </ul>
      <form class="form-inline my-2 my-lg-0" method="GET" action="index.php">
        <input class="form-control mr-sm-2" type="hidden" name='page' value="rechercher" placeholder="Chercher">
        <input class="form-control mr-sm-2" type="text" name='recherche' placeholder="Chercher">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>