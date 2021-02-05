<h1>Resultat de la recherche :</h1>

<div class="listeProfils">

    <?php
    if (count($recherche) > 0) {
        
        foreach ($recherche as $data) {
            echo "<div>
                   <img src='" . $data['image'] . "' class='photo' ><br>
                    <a href='index.php?page=profil&id=" . $data['id_user'] . "'>
                    " . $data['prenom'] . "
                    " . $data['nom'] . "
                    </a>
                </div>";
        }
    } else {
        echo "<h2 style='color:red'>aucun profil trouvé</h2>";
    }
    ?>
</div>