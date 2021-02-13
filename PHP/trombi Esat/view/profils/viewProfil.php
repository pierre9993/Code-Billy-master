<?php
if (isset($_POST['nom_contenus'])) {
    if ($ajoutContenu === true) {
    echo" <div class='text-center text-success'>Ajout du contenu effectué avec succès ! </div>"; 
    }
    else{
        echo" <div class='text-center text-danger'>Erreur lors de l'ajout du contenu ! </div>"; 
    
    }
}
?>

<div class="d-flex flex-row justify-content-between align-items-center">
    <h1>Profil de <?php echo strtoupper($profil['nom']); ?> </h1>
    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#myModal">
        Ajout cat
    </button>
</div>
<div class="row container-fluid">
    <!-- affiche les informations du profil -->
    <div class="col-4">
        <img src="<?php echo  $profil['image']; ?>" class="figure-img img-fluid rounded"><br>
        <b>
            <?php echo  $profil['prenom']; ?>
            <?php echo  strtoupper($profil['nom']); ?>
        </b>
        <br> <?php echo  $profil['info']; ?>
        <br> <?php echo  $profil['email']; ?>
        <br> <a href="<?php echo  $profil['cv']; ?>" target="_blanc">CV</a>
        <br>
        <?php if (isset($_SESSION['id_user']) && $_SESSION['id_user'] == $profil['id_user']) { ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Modifier
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <form action="" method="POST" enctype='multipart/form-data'>
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modification du profil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $profil['nom']; ?>" placeholder="Enter votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $profil['prenom']; ?>" placeholder="Enter votre prenom">
                                </div>
                                <div class="form-group">
                                    <label for="nom">Description</label>
                                    <textarea class="form-control" name="infos" placeholder="Enter votre description"><?php echo $profil['info']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cv">CV</label>
                                    <input type="file" class="form-control" name="cv" id="cv" value="<?php echo $this->cv; ?>" placeholder="Enter votre image">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" value="<?php echo $this->image; ?>" placeholder="Enter votre image">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $profil['email']; ?>" placeholder="Enter votre email">
                                </div>
                                <div class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Enter votre mdp" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <!-- affiche les categories et le contenus du profil -->
    <div class="col-8 border">
        <?php
        // je declare la variable $cat vide
        $cat = "";
        foreach ($profilConCat as $data) {
            // je fait un cotrole si $cat et different de $data['id_categorie'] j'affiche la categorie
            // si non je $afficheCat et vide
            // $afficheCat = ($cat != $data['id_categorie']) ? "<h3>" .  $data['cat'] . "</h3>" : "";
            if ($cat != $data['id_cat']) {
                $afficheCat = "<h3 >" .  $data['nom_cat'] . "</h3>";
            } else {
                $afficheCat = "";
            }
            echo "         
            " . $afficheCat . "        
            <b>  " .  $data['nom_contenus'] . " </b>
            <p> " . $data['description_contenus'] . "</p>
            ";
            // j'alimente la variabe $cat par l'id de la categorie
            $cat = $data['id_cat'];
        } ?>

    </div>

    <!-- Button to Open the Modal -->


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Ajout Contenu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group"><label for="categorie"> categorie: </label>
                            <select name="id_cat" id="id_cat">
                                <option  value="">--Choisissez une catégorie--</option>
                                <?php
                                foreach ($cats as $cat) {
                                    echo '<option  value="' . $cat['id_cat'] . '">' . $cat["nom_cat"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nom_contenus">Titre du contenu</label>
                            <input type="text" class="form-control" name="nom_contenus" id="nom_contenus" value="" placeholder="Enter le titre du contenu">
                        </div>
                        <div class="form-group">
                            <label for="description_contenus">Contenu</label>
                            <textarea class="form-control" name="description_contenus" id="description_contenus"></textarea>
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
                </form>
            </div>
        </div>
    </div>