<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Supprimer un article</h2>
</div>

<?php

if ($article->id !==null){
echo "L'article ". $article->id . " a bien été supprimé";

}

?>


<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=delete_art">
        <div class="form-group">
            <label for="id">Id de l'article :</label>
            <input type="text" name="id" class="form-control" placeholder="ID DE L'ARTICLE A SUPPRIMER" id="id">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
        </div>
</div>
</form>
</div>