<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Supprimer une Catégories</h2>
</div>



<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=delete_cat">
        <div class="form-group">
            <label for="nom_cat">Nom Catégorie:</label>
            <input type="text" name="nom_cat" class="form-control" placeholder="Entrer Nom Catégorie" id="nom_cat">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
<?php if($cat->nom_cat !== null){
echo "La catégorie " . $cat->nom_cat . " a été supprimé ";
}
?>
</form>
</div>