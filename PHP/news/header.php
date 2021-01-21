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
    <title>News</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light" id="navbar">
        <a class="navbar-brand" href="index.php?page=">NEWS</a>
        <ul class="navbar-nav">
            <li class="nav-item" ><a class="nav-link" href="index.php?page=inscription">Inscription<a></li>
            <?php menu($bdd); ?>
        </ul>
    </nav>

