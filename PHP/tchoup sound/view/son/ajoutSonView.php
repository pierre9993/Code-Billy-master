<div class="p-0 container mt-3 rounded shadow header-form bg-secondary">
    <h2 class="bg-nav p-3 shadow-sm rounded">Ajout de son</h2>
    <form  enctype="multipart/form-data" class="shadow pb-2" method="POST" action="index.php?page=ajoutSon">
        <div class="ml-3 mr-3 form-group">
            <label for="nom_son">Nom du son:</label>
            <input type="text" name="nom_son" id="nom_son" class="form-control" />
        </div>
        <div class="ml-3 mr-3 form-group">
            <label for="img_son">Image du son:</label><br/>
            <input type="file" name="img_son" id="img_son" accept="image/*" class="" />
        </div>
        <div class="ml-3 mr-3 form-group">
            <label for="lien_son">fichier du son:</label><br/>
            <input type="file" name="lien_son" id="lien_son" accept="audio/*" class="" />
        </div>
        <button type="submit" class="ml-3 mt-2 btn btn-light mb-2 align-self-right">Enregistrer</button>
    </form>



</div>