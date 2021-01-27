<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Nouvel article</h2>
</div>

<?php


if($article->titre !== null){

echo "L'article ". $article->id. " a été créé ";
};
?>


<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=create_art">
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" name="titre" class="form-control" placeholder="Entrer titre" id="titre">
        </div>
        <div class="form-group">
            <label for="contenu">Contenu:</label>
            <input type="text" name="contenu" class="form-control" placeholder="Entrer contenu" id="contenu">
        </div>
        <div class="form-group">
            <label for="img">Image:</label>
            <input type="url" name="img" class="form-control" placeholder="https://picsum.photos/199/102" id="img">
        </div>
        <div class="form-group">
            <label for="id_cat">Number:</label>
            <input type="text" name="id_cat" class="form-control" placeholder="Entrer Numéro de catégorie" id="id_cat">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
</form>
</div>