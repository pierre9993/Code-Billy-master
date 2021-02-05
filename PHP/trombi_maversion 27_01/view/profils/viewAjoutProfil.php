<div id="inscriptionhead" class='d-flex flex-row align-items-center shadow-sm justify-content-between container mt-3 bg-dark text-light '>
    <h1>Inscription</h1>
</div>
<?php
 
if (isset($_POST['nom'])) {
    if ($newProfil['nom'] === true && $newProfil['prenom'] === true && $newProfil['email'] === true ) {
        echo '<div class="mt-3 border text-center container text-success">Profil Créé</div>';
    }
   else {
        echo '<div class="m border text-center container text-danger">Champs invalide</div>';
    }
}
?>

<div class="container border shadow mb-3 pt-2">
    <form method="POST" action="index.php?page=ajoutProfil">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" class="form-control <?php 
           
           if (isset($_POST['nom'])) {
               if ($newProfil['nom'] !== true) {
                   echo 'border-danger';
               }
       }
       ?>" placeholder="..." id="nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" name="prenom" class="form-control <?php 
           
                if (isset($_POST['nom'])) {
                    if ($newProfil['prenom'] !== true) {
                        echo 'border-danger';
                    }
            }
            ?>" placeholder="..." id="prenom">
        </div>
        <div class="form-group">
            <label for="info">Info:</label>
            <textarea type="text" name="info" class="form-control" placeholder="..." id="info"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="url" name="image" class="form-control" value="https://picsum.photos/199" id="image">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control <?php 
           
           if (isset($_POST['nom'])) {
               if ($newProfil['email'] !== true) {
                   echo 'border-danger';
               }
       }
       ?>" placeholder="..." id="email">
        </div>
        <div class="form-group">
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" class="form-control" placeholder="..." id="mdp">
        </div>
        <div class="form-group">
            <label for="cv">CV:</label>
            <input type="text" name="cv" class="form-control" placeholder="..." id="cv">
        </div>
        <div class="form-group">
            <label for="id_role">Role:</label><br />
            <select name="id_role">
                <option value="1">Eleve</option>
                <option value="2">Professeur</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
</form>
</div>

