<h1>Profil de <?php
                /** @var Model\ProfilModel $profil */
                echo strtoupper($profil->getNom()); ?>
</h1>
<div class="row container-fluid">
    <!-- affiche les informations du profil -->
    <div class="col-4">
        <img src="<?php echo $profil->getImage(); ?>" class="figure-img img-fluid rounded"><br>
        <b>
            <?= $profil->getFullname() ?>
        </b>
        <br> <?= $profil->getInfos() ?>
        <br> <?= $profil->getEmail() ?>
        <br> <a href="<?= $profil->getCv() ?>" target="_blanc">CV</a>
        <br>
        <?php if (isset($_SESSION['id_user']) && $_SESSION['id_user'] == $profil->getId()) { ?>
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
                                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $profil->getNom(); ?>" placeholder="Enter votre nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $profil->getPrenom(); ?>" placeholder="Enter votre prenom">
                                </div>
                                <div class="form-group">
                                    <label for="nom">Description</label>
                                    <textarea class="form-control" name="infos" placeholder="Enter votre description"><?php echo $profil->getInfos(); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cv">CV</label>
                                    <input type="file" class="form-control" name="cv" id="cv" value="<?php echo $profil->getCv(); ?>" placeholder="Enter votre image">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" value="<?php echo $profil->getImage(); ?>" placeholder="Enter votre image">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $profil->getEmail(); ?>" placeholder="Enter votre email">
                                </div>
                                <div class="form-group">
                                    <label for="mdp">Mot de passe</label>
                                    <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Enter votre mdp" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary" name="submit">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
    <!-- affiche les categories et le contenus du profil -->
    <div class="col-8">
        <?php
        // je declare la variable $cat vide
        $cat = "";
        foreach ($profil->getContenus() as $contenu) {
            // je fait un cotrole si $cat et different de $data['id_categorie'] j'affiche la categorie
            // si non je $afficheCat et vide
            // $afficheCat = ($cat != $data['id_categorie']) ? "<h3>" .  $data['cat'] . "</h3>" : "";
            if ($cat != $contenu->getCategorie()->getId()) {
                $afficheCat = "<h3 >" .  $contenu->getCategorie()->getNom() . "</h3>";
            } else {
                $afficheCat = "";
            }
            echo "         
            " . $afficheCat . "        
            <b >  " .  $contenu->getNom() . " </b>
            <p > " . $contenu->getDescription() . "</p>
            ";
            // j'alimente la variabe $cat par l'id de la categorie
            $cat = $contenu->getCategorie()->getId();
        } ?>

    </div>