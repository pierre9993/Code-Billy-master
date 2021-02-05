<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>TROMBI</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/logo2.png" style="width: 150px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="index.php?page=profils">Profils</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <!-- debut de controle si l'utilisateur est connecté -->
          <?php if (isset($_SESSION['id_user'])) { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=monProfil">
                <?php echo $_SESSION['nom'] . ' ' . $_SESSION['prenom']; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=deconnexion">Deconnexion</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=inscription">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=connexion">Connexion</a>
            </li>
          <?php } ?>
          <!-- fin du controle -->
        </ul>
        <form class="d-flex" action="index.php" method="GET">
          <input type="hidden" name="page" value="recherche">
          <input class="form-control me-2" type="search" name="q" id="q" placeholder="Cherche un profil">
          <button class="btn btn-outline-success" type="submit">Chercher</button>
        </form>
      </div>
    </div>
  </nav>