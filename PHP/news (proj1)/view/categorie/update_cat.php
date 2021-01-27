<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Modifier une Catégories</h2>
</div>
<?php
if ($isUpdate == true) {
    echo "La catégorie " . $cat->nom_cat . " a été modifié ";
}
?>
<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=update_cat&id=<?php $cat->id_cat ?>">
        <div class="form-group">
            <label for="id_cat">ID Catégorie:</label>
            <input type="text" name="id_cat" class="form-control" placeholder="Entrer ID Catégorie" id="id_cat">
        </div>
        <div class="form-group">
            <label for="nom_cat">Nom Catégorie:</label>
            <input type="text" name="nom_cat" class="form-control" placeholder="Entrer Nom Catégorie" id="nom_cat">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
</form>
</div>