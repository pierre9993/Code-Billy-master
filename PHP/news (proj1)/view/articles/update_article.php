<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Modifier article</h2>
</div>

<?php

if($article->id !== null){
echo "L'article ". $article->id. " a été mise à jour";
}

?>


<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=update_art">
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" name="titre" class="form-control" placeholder="<?php echo $article->titre ?>" value="<?php echo $article->titre ?>" id="titre">
        </div>
        <div class="form-group">
            <label for="contenu">Contenu:</label>
            <input type="text" name="contenu" class="form-control" placeholder="<?php echo $article->contenu ?>" value="<?php echo $article->contenu ?>" id="contenu">
        </div>
        <div class="form-group">
            <label for="img">Image:</label>
            <input type="url" name="img" class="form-control" placeholder="<?php echo $article->img ?>" value="<?php echo $article->img ?>" id="img">
        </div>
        <div class="form-group">
            <label for="id">Id Article:</label>
            <input type="text" name="id" class="form-control" placeholder="<?php echo $article->id ?>" value="<?php echo $article->id ?>" id="id">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
</form>
</div>