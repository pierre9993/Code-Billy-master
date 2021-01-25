<div class="container-fluid border mt-3 mb-3">
    <h2 class=" mt-2">Update article</h2>
</div>

<?php

$article = new Article($bdd);
if(array_key_exists("submit",$_POST))
{
$article->titre = @$_POST["titre"];
$article->contenu = @$_POST["contenu"];
$article->img = @$_POST["img"];
$article->id_cat = @$_POST["id_cat"];
$article->identifiant_user = 2; //TOdo plus tard et prendre l'utilisateur connecté
$date = new \DateTime();
$article->_date = $date->format('Y-m-d');


$article->insert($bdd);

echo "L'article ". $article->id. " a été mise à jour";
}
?>


<div class="container border mt-3 mb-3">
    <form method="POST" action="index.php?page=create_art">
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
            <label for="id_cat">Number:</label>
            <input type="text" name="id_cat" class="form-control" placeholder="<?php echo $article->id_cat ?>" value="<?php echo $article->id_cat ?>" id="id_cat">
        </div>
        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
</div>
</form>
</div>