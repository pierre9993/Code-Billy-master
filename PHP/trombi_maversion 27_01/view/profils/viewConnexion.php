<div id="inscriptionhead" class='d-flex flex-row align-items-center shadow-sm justify-content-between container mt-3 bg-dark text-light '>
    <h1>Connexion</h1>
</div>

    <?php // ON VA VERIFIER LA CORRESPONDANCE AVEC password_verify(MOT DE PASSE EN CLAIRE , MOT DE PASSE CRYPTER)
    if (isset($_POST["mdp"])) {
        if ($co === 1) {
            echo  "<div class='container border text-success text-center'>Connexion réussi au compte de ".$_SESSION['nom'].' '.$_SESSION['prenom'] ."</div>";
            //     $_SESSION["nom_user]= $user["nom"]
        } else {
            echo "<div class='container border text-danger text-center'>Connexion Echoué</div>";
        }
    }
    ?>

<div class='container border'>
    <form action="?page=connexion" method="POST">
        Email:<br /> <input type="text" name="email" placeholder="" id="email"><br />
        Mot de passe:<br /><input type="password" name="mdp" placeholder="" id="mdp"><br />
        <button type="submit" class='mb-2 mt-2'>Continuer</button>
    </form>

</div>