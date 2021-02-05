    <?php
    if (isset($_POST['nom'])) {
        echo "<div class='border container bg-danger'>" . $modifcheck['nom'] . "aa</div>";
        if ($modifcheck['nom'] === true && $modifcheck['prenom'] === true && $modifcheck['email'] === true) {
            echo '<div class="mt-3  text-center container text-success">Profil Modifié</div>';
        } else {
            echo '<div class="mt-3 text-center container text-danger">Modification invalide</div>';
        }
    }
    ?>
    <div id="profilHead" class='container border mt-3 bg-dark text-light shadow '>
        <div class='d-flex flex-row justify-content-between align-items-center'>
            <h1><?php echo $profilSelect['nom'] . " " . $profilSelect['prenom'] ?></h1>
            <?php if (isset($_SESSION['id_user'])) {
                if ($_SESSION['id_user'] === $profilSelect['id_user']) {
                    echo '<div class="d-flex flex-row"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal" id="modifierProfil">Modifier profil</button>';
                    echo '<div class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Modifier Contenue
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Ajouter Contenu</a>
                    <a class="dropdown-item" href="#">Retirer Contenu</a>
                    <a class="dropdown-item" href="#">Modifier Contenu</a>
                    </div>                  </div></div>';
                }
            } ?>
        </div>

        <div class='container d-flex flex-row border mb-3 bg-light text-dark '>

            <?php
            //  echo "<div class='d-flex flex-row justify-items-between'>";
            echo "<div class='col-4 d-flex flex-column border mb-3 mt-3 mr-3'>";
            echo "<img class='mt-3 mb-3 border shadow p-0' src='" . $profilSelect['image'] . "'/>";
            //   echo "<p>".$profilSelect['nom'].' '.$profilSelect['prenom']."</p>";
            echo "<p><strong>" . $profilSelect['nom_role'] . "</strong></p>";
            echo "<p>" . $profilSelect['info'] . "</p>";
            echo "<p>" . $profilSelect['email'] . "</p>";
            echo "<a href='" . $profilSelect['cv'] . "'>CV</a>";
            echo "</div>";

            echo "<div class=' col-8 mt-3 mb-3 mr-3' >";
            // $nomcat = $catSelect[0];
            // echo "<h2>" . utf8_encode($nomcat['nom_cat']) . "</h2>";
            $cat = '';
            foreach ($catSelect as $info) {
                //   $afficheCat= ($cat!= $info['id_cat']) ? "<h3>".$info["nom_cat"]."</h3>":"$afficheCat=" ;
                if ($cat != $info['id_cat']) {
                    $afficheCat = "<h2>" . utf8_encode($info['nom_cat']) . "</h2>";
                } else {
                    $afficheCat = "";
                }
                echo $afficheCat;
                echo "<p><strong><i>" . utf8_encode($info['nom_contenus']) . "</i></strong></p>";
                echo "<p>" . utf8_encode($info['description_contenus']) . "</p>";
                $cat = $info['id_cat'];
                //    }
            }
            echo "</div>";

            echo "</div>";
            ?>
        </div>

    </div>




    <!-- MODELE MODIF PROFIL -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modifier Le Profil</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="?page=profil&id=<?php echo $profilSelect['id_user'] ?>">
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?php echo $profilSelect['id_user'] ?>" id="id_user">
                            <label for="nom">Nom:</label>
                            <input type="text" name="nom" value="<?php echo $profilSelect['nom'] ?>" class="form-control <?php

                                                                                                                            if (isset($_POST['nom'])) {
                                                                                                                                if ($modifcheck['nom'] !== true) {
                                                                                                                                    echo 'border-danger';
                                                                                                                                }
                                                                                                                            }
                                                                                                                            ?>" placeholder="..." id="nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prenom:</label>
                            <input type="text" name="prenom" value="<?php echo $profilSelect['prenom'] ?>" class="form-control <?php

                                                                                                                                if (isset($_POST['nom'])) {
                                                                                                                                    if ($modifcheck['prenom'] !== true) {
                                                                                                                                        echo 'border-danger';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                ?>" placeholder="..." id="prenom">
                        </div>
                        <div class="form-group">
                            <label for="info">Info:</label>
                            <textarea type="text" name="info" class="form-control" id="info"><?php echo $profilSelect['info'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="url" name="image" value="<?php echo $profilSelect['image'] ?>" class="form-control" id="image">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" value="<?php echo $profilSelect['email'] ?>" class="form-control <?php

                                                                                                                                if (isset($_POST['nom'])) {
                                                                                                                                    if ($modifcheck['email'] !== true) {
                                                                                                                                        echo 'border-danger';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                ?>" placeholder="..." id="email">
                        </div>
                        <div class="form-group">
                            <label for="cv">CV:</label>
                            <input type="text" name="cv" value="<?php echo $profilSelect['cv'] ?>" class="form-control" placeholder="..." id="cv">
                        </div>

                        <button type="submit" class="btn btn-primary mb-2 align-self-right">Valider</button>
                </div>
                </form>
            </div>

        </div>
    </div>
