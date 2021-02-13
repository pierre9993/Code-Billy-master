<br>
<div class="card border-secondary mb-3" style="margin: auto; max-width: 80%;">
    <div class="card-header">Insciption</div>
    <div class="card-body">
        <p class="card-text">
            <?php echo @$message; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Enter votre nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Enter votre prenom">
            </div>
            <div class="form-group">
                <label for="nom">Description</label>
                <textarea class="form-control" name="infos" placeholder="Enter votre description"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Enter votre image">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter votre email">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Enter votre mdp">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">S'inscrir</button>
        </form>


        </p>
    </div>
</div>
<br>