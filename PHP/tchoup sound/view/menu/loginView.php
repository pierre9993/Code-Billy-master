<div id="inscriptionhead" class='d-flex flex-row align-items-center shadow-sm justify-content-between container mt-3 bg-nav text-light '>
    <h1>Connexion</h1>
</div>

<div class='container border bg-light text-dark shadow'>
<?php // ON VA VERIFIER LA CORRESPONDANCE AVEC password_verify(MOT DE PASSE EN CLAIRE , MOT DE PASSE CRYPTER)
if (isset($_POST["mdp"])) {
    $co=0;
    if ($_POST["id"] === "morlelucas") {
        echo $mdpBcript = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

        if (password_verify(@$_POST["mdp"], '$2y$10$CorBOKDI5fVK06MC/PYfXOg9Eo4gEvTMDgX/Z.B8sEj/73h1U4tye')) {

            $_SESSION['id'] = @$_POST['id'];
            $_SESSION['role'] = "admin";
            //     $_SESSION["nom_user]= $user["nom"]
            header('Location: index.php');
            $co = 1;
        }
    }

    if ($co === 1) {
        echo  "<div class='bg-muted container border text-success text-center'>Connexion réussi </div>";
        //     $_SESSION["nom_user]= $user["nom"]
    } else {
        echo "<div class='bg-muted container text-danger text-center'>Connexion Echoué</div>";
    }
}
?>

    <form action="?page=login" method="POST">
        Identifiant:<br /> <input type="text" name="id" placeholder="" id="id"><br />
        Mot de passe:<br /><input type="password" name="mdp" placeholder="" id="mdp"><br />
        <button type="submit" class='mb-2 mt-2'>Connexion</button>
    </form>

</div>