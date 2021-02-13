<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>TCP Sound</title>
</head>

<body class="bg-body text-light">
    <nav class="navbar navbar-expand navbar-dark bg-nav">


        <div class="collapse navbar-collapse d-flex flex-row justify-content-between align-items-center shadow" id="navbarColor02">
            
            <div class=" d-flex justify-content-center  align-items-center">
                <a class="ml-2 navbar-brand " href="index.php?page="><img src="img/billy.jpg" alt="billy" class='fond' id="img_acceuil" /></a>
                <form class="form-inline my-2 my-lg-0" method="GET" action="index.php">
                    <input class="form-control mr-sm-2" type="hidden" name='page' value="rechercher" placeholder="Chercher">
                    <input class="form-control mr-sm-2" type="text" name='recherche' placeholder="Nom de musique..">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Chercher</button>
                </form>
                <ul class="navbar-nav ">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class=" nav-item d-flex flex-row">
                <?php if (isset($_SESSION["id"])) {
                    echo '<a class=" nav-link button text-secondary">'.$_SESSION["id"].'</a><a href="?page=deconnexion" class="text-secondary nav-link button  pr-2 pl-2"> déconnexion </a></li>';
                    if($_SESSION["role"]==="admin"){
                        echo'<a class="nav-link text-secondary" href="index.php?page=ajoutSon">ajouter son</a> ';
                    }
                } else {
                    echo '<a class="nav-link text-secondary" href="index.php?page=login">Login</a>';
                }

                ?>


            </div>
        </div>
    </nav>